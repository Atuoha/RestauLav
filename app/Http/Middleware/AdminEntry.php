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
                return $next($request);
            }

        //  return redirect('/unactive-account');   
        // I was planning to use this to redirect unactivated account assuming i added the criteria on  is_admin()

        }else{
          return redirect('/');
        }


    }
}
