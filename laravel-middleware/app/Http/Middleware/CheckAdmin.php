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
        //logika prije rute
        if($request->query('admin') !=1 && $request->query('admin') !=5){
            return response('Access denied',403);
        }

        //dd('Admin OK - prikaži panel');

        return $next($request);
        //logika nakon rute
    }
}
