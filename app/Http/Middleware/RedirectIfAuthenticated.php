<?php

namespace App\Http\Middleware;

use App\Constants;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->priority == Constants::MANAGERPRIORITY)
                return redirect('/dashboard');
            elseif(auth()->user()->priority == Constants::ADMINPRIORITY)
                return redirect('/admin');
            else
                return redirect('/');
        }

        return $next($request);
    }
}
