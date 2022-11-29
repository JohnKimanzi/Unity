<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ValidatePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->password_is_valid) {
                return $next($request);
            } else {
                session()->flash('error', 'Admin says you have to reset your password');
                return response()->redirectTo('password/reset');
            }
        }
        else{
            return Redirect::route('login')->with('error', 'Login to proceed!');
        }
    }
}
