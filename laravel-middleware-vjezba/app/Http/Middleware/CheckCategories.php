<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    
    {
        $service = new CategoryService();
        $categories = $service->getAll();

        if(count($categories)<2){
            $this->logForbidden($request,'Nedovoljan broj kategorija');
            return response('Mora postojati barem 2 kategorije',403);
        }
        
        foreach($categories as $category){
            if($category->popularnost < 5){
                $this->logForbidden($request,'Kategorija "'.$category->opis.'" ima popularnost '.$category->popularnost);
                return response('Kategorija "'.$category->opis.'" nema dovoljnu popularnost');
            }
        }
        return $next($request);
    }

    public function logForbidden(Request $request, string $reason): void{
        Log::warning('403 Forbidden',[
            'route' => $request->path(),
            'reason' => $reason,
            'ip'=>$request->ip(),
        ]);
    }
}
