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
        if (!Auth::check()) {
            return redirect()
            ->route('view.login')
            ->with('error',"You must Log in first!");
        }

        if(Auth::user()->role_id == 1)
        {
            return redirect()
            ->route('admin.dashboard');
        }

        if(Auth::user()->role_id == 2 )
        {
            return redirect()
            ->route('user.dashboard');
        }

        return $next($request);
    }
}
