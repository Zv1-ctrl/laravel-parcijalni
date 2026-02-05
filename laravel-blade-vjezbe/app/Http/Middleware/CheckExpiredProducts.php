<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckExpiredProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = 'proizvodi.json';

        if (!Storage::exists($path)) {
            return $next($request);
        }
    $raw = Storage::get($path);
    $data = json_decode($raw, true);

    $today = Carbon::today();
    foreach($data as $p){
        $rok = $p['rokisteka'] ?? null;
        if(empty($rok)) {
            continue;
        }

        if(Carbon::parse($rok)->lt($today)){
            $naziv = $p['naziv'] ?? '(nepoznat naziv)';
            $formatted = Carbon::parse($rok)->format('d.m.Y');
            return response(
                "Zabranjen prikaz: Proizvodu '$naziv' je istekao rok ({$formatted}).",403
            );
        }
    }

    return $next($request);
}
}