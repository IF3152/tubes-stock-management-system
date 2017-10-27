<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
    
    if( Auth::guard($guard)->check() && Auth::user()->isAdmin == 1 )
        {
            return $next($request);
        } else {
            return redirect()->guest('/');
        }
        return $next($request);
    }
}
