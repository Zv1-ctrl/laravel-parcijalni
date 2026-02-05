<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('LogAccess: Middleware započeo');
        //return $next($request);
        $response = $next($request);

        $response->headers->set('X-User-Status','active');
        $response->headers->set('X-Access-Loged','yes');

        Log::info('LogAccess: Middleware završio');
        return $response;
    }
}
