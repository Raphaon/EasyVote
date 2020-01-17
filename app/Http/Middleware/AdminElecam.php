<?php

namespace App\Http\Middleware;

use Closure;

class AdminElecam
{
    /**
     * Middleware de l'admin ... c-à-d le gérant de Elecam
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
       if(auth()->user()->priority != '1'){
            return redirect()->back() ;
        }

       return $next($request);  
    }
}
