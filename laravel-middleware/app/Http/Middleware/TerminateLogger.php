<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TerminateLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void{
        //Log::info('Terminate middleware: zahtjev je završen');
        Log::info('Terminate middleware: zahtjev je obrađen',[
            'route'=>$request->path(),
            'status'=>$response->getStatusCode(),
        ]);

    }
}
