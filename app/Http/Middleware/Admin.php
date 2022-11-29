<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if (Auth::user()!=null) 
            {
                abort_unless(Auth::user()->hasRole('admin'), 403, 'You are not allowed to go there!');
                return $next($request);
            }
        }
        else{
            return Redirect::route('login')->with('error', 'Login to access restricted area!');
        }
    }
}
