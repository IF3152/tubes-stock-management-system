<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\UserRole;
class UserCabang
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
    
    if( Auth::guard($guard)->check() && count((UserRole::where('user_id',Auth::user()->id)->get()))>0 )

        {
            return $next($request);
        } else {
            return redirect('/home')->with('pesan','Tidak dapat membuat order');
        }
        return $next($request);
    }
}
