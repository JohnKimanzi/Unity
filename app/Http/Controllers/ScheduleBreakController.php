<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSchedule;
use App\Models\ScheduleBreak;
use App\Models\TimeRecordType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDO;

class ScheduleBreakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'schedule_id'=>'uuid|required',
            'break_ids'=>'array|required'
        ]);
        // dd($request->all());
        try {
            $schedule = EmployeeSchedule::findOrFail($request->schedule_id);
            foreach($request->break_ids as $break_id){
                try {
                    // dd($schedule->breaks);
                    ScheduleBreak::create([
                        'time_record_type_id'=>TimeRecordType::findOrFail($break_id)->id,
                        'employee_schedule_id'=>$schedule->id,
                    ]);
                } catch (\Throwable $th) {
                    session()->flash('warning', "Attention! Break id: {$break_id} Could not be added.");
                    continue;
                }
            }
            return back()->with('success', 'Done!');
        } catch (\Throwable $th) {
            Redirect::back()->with('error', "The selected schedule is invalid. No action was taken.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleBreak  $scheduleBreak
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleBreak $scheduleBreak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleBreak  $scheduleBreak
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleBreak $scheduleBreak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleBreak  $scheduleBreak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleBreak $scheduleBreak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleBreak  $scheduleBreak
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleBreak $scheduleBreak)
    {
        //
    }

    public function break_position( Request $request,ScheduleBreak $scheduleBreak){
        // if()
        $break = $scheduleBreak;
        $current_position=$break->position;
        // $break->move($current_position+1);
        if($break->employee_schedule->breaks()<>null) {

            $highest_position = $break->employee_schedule->breaks()->orderBy('position','desc')->first()->position;
        } 
        // $break->move($break->position+1);
        // dd( $break->employee_schedule->breaks()->orderBy('position','desc')->pluck('id','position'));
        $request->validate([
            'direction'=>'required|string',
        ]);
        if($break->position===null){
            $break->position=$highest_position+1 ;
            $break->save();
        }else
        if(strtolower($request->direction) == 'down'){
            if($current_position < $highest_position){
                $break->move($current_position+1);
            }
        }elseif(strtolower($request->direction) == 'up'){
            if($current_position > 1){
                $break->move($current_position-1);
            }
        }else{
            return back()->with('error', 'Invalid direction option! No action was taken');
        }
        // dd("Before: {$current_position}. Aftre: {$break->position} Highest{$highest_position}");
        return back()->with('success','Done!');
    }
}
