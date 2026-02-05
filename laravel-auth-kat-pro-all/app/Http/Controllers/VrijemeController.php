<?php

namespace App\Http\Controllers;

use App\Models\Prognoza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class VrijemeController extends Controller
{
      public function index(Request $request)
    {
        $q = $request->query('q');

        $prognoze = Prognoza::query()
            ->when($q, fn($qr) => $qr->where('grad', 'like', "%{$q}%"))
            ->orderBy('grad')
            ->orderBy('datum')
            ->paginate(10)
            ->withQueryString();

        return view('vrijeme.index', [
            'prognoze' => $prognoze,
            'q' => $q,
        ]);
    }

    // Dohvati i spremi prognozu za grad (7 dana)
    public function fetch(Request $request)
    {
        $data = $request->validate([
            'grad' => ['required', 'string', 'max:120'],
        ]);

        $grad = trim($data['grad']);

        $this->fetchAndStoreForCity($grad);

        return redirect()
            ->route('vrijeme.index', ['q' => $grad])
            ->with('status', "Prognoza osvježena za: {$grad}");
    }

    // Refresh iz tablice (grad ide hidden)
    public function refresh(Request $request)
    {
        $data = $request->validate([
            'grad' => ['required', 'string', 'max:120'],
        ]);

        $grad = trim($data['grad']);

        $this->fetchAndStoreForCity($grad);

        return redirect()
            ->route('vrijeme.index', ['q' => $grad])
            ->with('status', "Prognoza osvježena za: {$grad}");
    }

    private function fetchAndStoreForCity(string $grad): void
    {
        $clientId = config('services.xweather.client_id');
        $clientSecret = config('services.xweather.client_secret');

        // Xweather endpoint: forecasts/{place}
        // filter=day + limit=7 je tipično za dnevnu prognozu :contentReference[oaicite:1]{index=1}
        // fields=... preporučeno radi manje količine podataka :contentReference[oaicite:2]{index=2}
        $url = 'https://data.api.xweather.com/forecasts/' . rawurlencode($grad);

        /** @var \Illuminate\Http\Client\Response $resp */
        $resp = Http::timeout(15)->get($url, [
            'format' => 'json',
            'filter' => 'day',
            'limit' => 7,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,

            // Probaj prvo bez fields ako želiš vidjeti full response.
            // Kad potvrdiš nazive polja, možeš suziti:
            // 'fields' => 'response.periods.dateTimeISO,response.periods.maxTempC,response.periods.weather,response.periods.windSpeedKPH,response.periods.visibilityKM',
        ]);

        if (!$resp->ok()) {
            abort(502, 'Xweather API nije dostupan ili su ključevi pogrešni.');
        }

        $json = $resp->json();

        // Xweather obično vraća response[0].periods[]; dokumentacija opisuje forecasts dataset :contentReference[oaicite:3]{index=3}
        $periods = data_get($json, 'response.0.periods', []);

        $now = now();

        foreach ($periods as $p) {
            // DATUM: uzmi dateTimeISO i pretvori na Y-m-d
            $dateIso = $p['dateTimeISO'] ?? null;
            if (!$dateIso) continue;

            $datum = date('Y-m-d', strtotime($dateIso));

            // POLJA: nazivi mogu varirati ovisno o datasetu/fields.
            // Zato koristimo null-coalescing s uobičajenim imenima:
            $maxTempC = $p['maxTempC'] ?? $p['maxTemp'] ?? null;
            $weather  = $p['weather']  ?? $p['weatherPrimary'] ?? $p['summary'] ?? null;
            $wind     = $p['windSpeedKPH'] ?? $p['windSpeed'] ?? null;
            $vis      = $p['visibilityKM'] ?? $p['visibility'] ?? null;

            Prognoza::updateOrCreate(
                ['grad' => $grad, 'datum' => $datum],
                [
                    'maxTempC' => $maxTempC,
                    'weather' => $weather,
                    'windSpeed' => $wind,
                    'visibility' => $vis,
                    'zadnji_dohvat' => $now,
                ]
            );
        }
    }
}
