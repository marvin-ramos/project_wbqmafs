<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class Authenticated
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
         if(auth()->user()->role_id == 1){
            return $next($request);
        }
   
        return redirect('view')->with('error',"You don't have admin access.");
    }
}
