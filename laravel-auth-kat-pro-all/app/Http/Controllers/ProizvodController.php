<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use App\Models\Kategorija;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
class ProizvodController extends Controller
{
    // LISTA (admin + korisnik)
    public function index(): View
    {
        // $proizvodi = Proizvod::with('kategorija')
        //     ->orderBy('id')
        //     ->get();
        $proizvodi = Proizvod::with('kategorija')
        ->orderBy('id')
        ->paginate(5);

        return view('proizvodi.index', [
            'proizvodi' => $proizvodi,
        ]);
    }

    public function create(): View
    {
        //$kategorije = Kategorija::orderBy('naziv')->get();
        $kategorije = Kategorija::orderBy('naziv')
                ->where('aktivna', 1)
                ->get();

        return view('proizvodi.create', [
            'kategorije' => $kategorije,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:150'],
            'kolicina' => ['required', 'integer', 'min:0'],
            'cijena' => ['required', 'numeric', 'min:0'],
            'kategorija_id' => ['required', 'exists:kategorije,id'],
        ]);

        Proizvod::create($validated);

        return redirect()
            ->route('proizvodi.index')
            ->with('status', 'Proizvod je uspješno dodan.');
    }

    public function createnew(): View
    {
        //$kategorije = Kategorija::orderBy('naziv')->get();
        $kategorije = Kategorija::orderBy('naziv')
                ->where('aktivna', 1)
                ->get();

        return view('proizvodi.createnew', [
            'kategorije' => $kategorije,
        ]);
    }

    public function storenew(Request $request): RedirectResponse
    {
         $validated = $request->validate([
        'naziv' => ['required', 'string', 'max:150'],
        'kolicina' => ['required', 'integer', 'min:0'],
        'cijena' => ['required', 'numeric', 'min:0'],

        // dozvolimo ili broj (id) ili "new"
        'kategorija_id' => ['required', Rule::in(array_merge(
            ['new'],
            Kategorija::where('aktivna', 1)->pluck('id')->map(fn($x)=> (string)$x)->toArray()
        ))],

        // required samo kad je odabrano "new"
        'nova_kategorija_naziv' => ['required_if:kategorija_id,new', 'nullable', 'string', 'max:150'],
    ]);

    // 1) Ako je odabrano "new", kreiramo kategoriju
    if ($validated['kategorija_id'] === 'new') {

        $nova = Kategorija::create([
            'naziv' => $validated['nova_kategorija_naziv'],
            'aktivna' => 1,
        ]);

        $kategorijaId = $nova->id;

    } else {
        $kategorijaId = (int)$validated['kategorija_id'];
    }

    // 2) Kreiramo proizvod s odgovarajućom kategorijom
    Proizvod::create([
        'naziv' => $validated['naziv'],
        'kolicina' => $validated['kolicina'],
        'cijena' => $validated['cijena'],
        'kategorija_id' => $kategorijaId,
    ]);

    return redirect()
        ->route('proizvodi.index')
        ->with('status', 'Proizvod je uspješno dodan.');
    }

    public function edit(Proizvod $proizvod): View
    {
        $kategorije = Kategorija::orderBy('naziv')->get();

        return view('proizvodi.edit', [
            'proizvod' => $proizvod,
            'kategorije' => $kategorije,
        ]);
    }

    public function update(Request $request, Proizvod $proizvod): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => ['required', 'string', 'max:150'],
            'kolicina' => ['required', 'integer', 'min:0'],
            'cijena' => ['required', 'numeric', 'min:0'],
            'kategorija_id' => ['required', 'exists:kategorije,id'],
        ]);

        $proizvod->update($validated);

        return redirect()
            ->route('proizvodi.index')
            ->with('status', 'Proizvod je uspješno ažuriran.');
    }

    public function destroy(Proizvod $proizvod): RedirectResponse
    {
        $proizvod->delete();

        return redirect()
            ->route('proizvodi.index')
            ->with('status', 'Proizvod je uspješno obrisan.');
    }

    public function search(Request $request): View
    {
        $query = $request->input('naziv');

        $proizvodi = Proizvod::with('kategorija')
            ->when($query, function ($q) use ($query) {
                $q->where('naziv', 'like', '%' . $query . '%');
            })
            ->orderBy('id')
            ->get();

        return view('proizvodi.search', [
            'proizvodi' => $proizvodi,
            'query' => $query,
        ]);
    }
}
