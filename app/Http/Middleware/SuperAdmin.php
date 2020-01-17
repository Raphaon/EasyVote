<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
{
    /**
     * Middleware du super-admin ... c-à-d le dev
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
       if(auth()->user()->priority != '2'){
            return redirect()->back() ;
        }

       return $next($request);  
    }
}
