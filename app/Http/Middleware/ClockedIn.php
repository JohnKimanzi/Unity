<?php

namespace App\Http\Middleware;

use App\Models\TimeRecordType;
use Closure;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClockedIn
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
                if(! Auth::user()->is_clocked_in || Auth::user()->has_active_break){
                    // session()->flash('error', 'You are not clocked in.');
                    return response()->view('time_records.pre_login', [
                        'title'=>'You are not clocked in!', 
                        'text'=>'Clock in to access the system',
                        'allowed_time_record_type'=>TimeRecordType::where('name', 'like', '%clock%')->first(),
                        'allowed_time_record_types'=>TimeRecordType::where('name', 'like', '%clock%')->get()]);
                } else return $next($request);
            }
        }
        else{
            return Redirect::route('login')->with('error', 'Login to access restricted area!');
        }
    }
}
