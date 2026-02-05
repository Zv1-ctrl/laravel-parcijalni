<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->query('status') != 1){
            //return response('Vaš račun nije još aktivan!',403);
            return redirect('/inactive')->with('error','Vaš račun nije još aktivan!');
        }
        //return $next($request);
        $response = $next($request);
        $response->headers->set('X-User-Status','active');
        $response->headers->set('X-App-Version','1.0');

        return $response;
    }
}
