<?php
namespace App\Notifications;

use App\Models\Call;
use App\Models\CallSchedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Noti
{
    public static function push()
    {
        if(Auth::user()!=null){

            $call_schedues=CallSchedule::where('schedule_at','>=', Carbon::now()->subMinutes(10))
                        ->where('schedule_at','<=', date('Y-m-d H:i',  strtotime(now()->timezone('EAT'))))
                        ->get();
            // dd(CallSchedule::where('schedule_at','>=', Carbon::now()->subMinutes(10))->where('schedule_at','<=',  Carbon::now())->get());
            if(count($call_schedues)>=1)
            {
                Session::put('send_noti', 'Yes');
            }
        }
    }
}
