<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminEntry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check()){
            if(Auth::user()->is_admin()){
               return $next($request);
            }else{
                return redirect('/account/end_user');
            }

         return redirect('/unactive-account');

        }
        return redirect('/');


    }
}
