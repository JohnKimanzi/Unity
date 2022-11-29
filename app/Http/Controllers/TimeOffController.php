<?php

namespace App\Http\Controllers;

use App\Models\TimeOff;
use App\Models\TimeOffType;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TimeOffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all users
        // users have many pto

        // return view('time_off.index', ['time_offs'=>TimeOff::all()->unique('user_id')]);
        $pay_period_start=(now()->format('d')<=15)? now()->startOfMonth() : now()->startOfMonth()->addDays(15);
        $users=User::with(['time_offs'=>function($time_off) use($pay_period_start){
            $time_off
                ->where('created_at', '>=', $pay_period_start->startOfDay())
                ->where('created_at', '<=', now()->endOfDay())->get();
        }])->get();
        // dd($users);
        $users->flatMap->time_offs->each(function($time_off){
            $time_off->record_date=$time_off->created_at->format('Y-m-d');
        });
        // dd(CarbonPeriod::create($pay_period_start, now()));
        return view('time_off.index', ['users'=>$users, 'pay_period_start'=>$pay_period_start]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeOff  $timeOff
     * @return \Illuminate\Http\Response
     */
    public function show(TimeOff $timeOff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeOff  $timeOff
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeOff $timeOff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeOff  $timeOff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeOff $timeOff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeOff  $timeOff
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeOff $timeOff)
    {
        $timeOff->delete();
        return back()->with('success','Done!');
    }
    public function timeOff(){
        // dd("Time Off");
        try {
            //code...
            if (null == Auth::user()->time_offs()->latest()->first() || null !== Auth::user()->time_offs()->latest()->first()->end  ) {
                # code...
                    $s=TimeOff::create([
                'user_id'=>Auth::user()->id,
                'time_off_type_id'=>TimeOffType::first()->id,
                'start'=>now(),
            ]);
            return back()->with('success', 'Request sent!');
            } else {
                return back()->with('error', 'Some issues were encountered! Maybe you have a still active break');
            }
            
            
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return back()->with('error', 'Some issues were encountered!');
        }
    }
    public function endTimeOff(){
        // dd('here');
        try {
            //code...
            $time_off=Auth::user()->time_offs()->latest()->first();
            if (is_null($time_off->end)) {
                # code...
                $time_off->update(['end'=>now()]);
                return Redirect::route('home')->with('success', 'Request sent!');
            }
            else return back()->with('error', "Some issues were encountered! No active beak!");
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            return back()->with('error', 'Some issues were encountered!');
        }
    }
    public function get_user_time_records(Request $request, User $user){
        $record_date = new CarbonImmutable($request->record_date);
        $time_sheets = $user->time_records()
            ->where('started_at', '>', $record_date->startOfDay())
            ->where('started_at', '<', $record_date->endOfDay())
            ->latest()
            ->get();
        // return $time_sheets;
        $total_hours=$time_sheets->sum('hours');
        $time_sheets->each(function($time_record)  {
            $time_record->type=$time_record->time_record_type->name;
            $time_record->start_time=($time_record->started_at) ? $time_record->started_at->format('H:i a') : '';
            $time_record->end_time=($time_record->ended_at) ? $time_record->ended_at->format('H:i a') : '';
            $time_record->length=round((new Carbon($time_record->started_at))->diffInMinutes($time_record->ended_at)/60,1);
            $time_record->action = "
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='".route('time_records.edit', $time_record->id)."'><i class='la la-pencil'></i> Edit Timesheeet</a>
                        <form action='".route('time_records.destroy', $time_record->id)."' method='post'>
                            <input hidden value = 'DELETE' name='_method'/>
                            <input hidden value = ".csrf_token()." name='_token'/>
                            <button type='submit' class='dropdown-item'><i class='fa fa-trash'></i> Remove</button>
                        </form>
                    </div>
                </div>
            ";
        });
        return response()->json(['results'=>$time_sheets, 'uname'=>$user->name, 'record_date'=>$record_date->format("Y-m-d"), 'total_hours'=>round($total_hours,1)]);
    }
    public function get_pto_data(){
        $res=TimeOff::latest()->get()->unique('user_id');
        // return json_encode($res);
        $res->each(function($time_off)  {
            $time_off->u_id=$time_off->user->id;
            $time_off->u_name=$time_off->user->name;
            $time_off->action="
                <div class='dropdown dropdown-action float-right'>
                    <a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i></a>
                    <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='end-time-off'><i class='fa fa-link'></i> End break</a>
                        <a class='dropdown-item' href='#'><i class='la la-pencil'></i> Adjust break</a>
                        <button id='show-all-breaks-btn' class='dropdown-item' data-toggle='modal' data-target='#all-breaks-modal' data-id='".$time_off->user->id."'><i class='fa fa-eye'></i> View details</button>
                        <a class='dropdown-item' href='".route('time_offs.destroy', $time_off->id)."'><i class='fa fa-trash'></i> Remove</a>
                    </div>
                </div>
            ";
        });
        return response()->json(['results'=>$res]);
    }
}
