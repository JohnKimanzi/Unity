<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSchedule;
use App\Models\TimeRecordType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee_schedules.index',['schedules'=>EmployeeSchedule::all()]);
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
        // dd($request->all());
        $request->validate([
            'name'=>'required|string',
            'effective_from'=>'required|date|before:effective_to',
            'effective_to'=>'required|date|after:effective_from',
            'description'=>'nullable|string',
        ]);
        EmployeeSchedule::create([
            'name'=>$request->name,
            'effective_from'=>$request->effective_from,
            'effective_to'=>$request->effective_to,
            'description'=>$request->description,
        ]);
        return back()->with('success', 'Schedule has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeSchedule  $employeeSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeSchedule $employeeSchedule)
    {
        return view('employee_schedules.show', [
            'schedule'=>$employeeSchedule, 
            'all_schedules'=>EmployeeSchedule::all(), 
            'users'=>User::all(), 
            'all_break_types'=>TimeRecordType::where('name', 'like', '%break%')
                // ->whereNot('name', 'like', '%custom%')->pluck('name') #Enable for laravel 9.x
                ->get()
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeSchedule  $employeeSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeSchedule $employeeSchedule)
    {
        return view('employee_schedules.edit', ['editable_schedule'=>$employeeSchedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeSchedule  $employeeSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeSchedule $employeeSchedule)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required|string',
            'effective_from'=>'required|date|before:effective_to',
            'effective_to'=>'required|date|after:effective_from',
            'description'=>'nullable|string',
        ]);
        $employeeSchedule->update([
            'name'=>$request->name,
            'effective_from'=>$request->effective_from,
            'effective_to'=>$request->effective_to,
            'description'=>$request->description,
        ]);
        return back()->with('success', "Schedule {$employeeSchedule->name} has been edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeSchedule  $employeeSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeSchedule $employeeSchedule)
    {
        // dd($employeeSchedule);
        try {
            $employeeSchedule->delete();
            return back()->with('success', "Schedule {$employeeSchedule->name} has been deleted. If you need to, Unity can recover it for you :)");
        } catch (\Throwable $th) {
            return back()->with('error', "Schedule {$employeeSchedule->name} could not be deleted. Check to make sure that no employees are allocated to it");
        }
    }
    public function allocate_employees(Request $request, EmployeeSchedule $employeeSchedule){
        // dd($request->all());
        $request->validate([
            'user_ids'=>'required|array',
        ]);
        foreach($request->user_ids as $user_id){
            User::findOrFail($user_id)->update(['employee_schedule_id'=>$employeeSchedule->id]);
        }
        return back()->with('success', "Done!");
    }
    public function re_allocate_employee(User $user, Request $request){
        $user->update(['employee_schedule_id'=>$request->new_schedule_id]);
        return back()->with('success', "Done! {$user->name} has been re-allocated");
    }
}
