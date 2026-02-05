<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user(); // trenutni user (ako je logiran)

        if (!$user || $user->usertype !== 0) {
            abort(403, 'Samo admin može pristupiti ovoj stranici.');
        }
        return $next($request);
    }
}
