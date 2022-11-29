<?php

namespace App\Http\Controllers;

use App\Models\PtoType;
use App\Models\TimeRecord;
use App\Models\TimeRecordType;
use App\Models\User;
use App\Traits\CustomGlobalFunctions;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
class TimeRecordController extends Controller
{
    use CustomGlobalFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('time_records.index', [
            'time_records'=>TimeRecord::all()]);
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
        $user=Auth::user();
        # Validate inputs
        $this->validate($request, [
            'time_record_type_id' => 'required|string',
            'break_description'=>'nullable|string',
        ]);
        $time_record_type=TimeRecordType::findOrFail($request->time_record_type_id);
        # Check if user is clocking in... 
        if (Str::contains(strtolower($time_record_type->name), 'clock')) {
            if (!$user->is_clocked_in) {
                # clock in here...
                TimeRecord::create([
                    'user_id' => Auth::user()->id,
                    'started_at' => now(),
                    'time_record_type_id' => $time_record_type->id
                ]);
                Session::flash('success', 'Clocked in successfully');
                return redirect(route('home'));
            } else {
                return back()->with('warning', 'You are already clocked in! No action was taken');
            }
        # ...or if user is just taking a break.    
        } else if (Str::contains(strtolower($time_record_type->name), 'break')){
            #make sure user is clocked in and has no active break and has not taken selected break today.
            if (! $user->is_clocked_in) {
                return back()->with('danger', 'You are not clocked in! This action is not allowed');
            }elseif ($user->has_active_break) {
                return back()->with('warning', 'You already have an active break! No action was taken');
            }elseif(STR::contains($user->breaks_today->pluck('time_record_type.name'), $time_record_type->name)){
                return back()->with('warning', 'You have already taken your '.$time_record_type->name.' today! No action was taken');
            }

            #Check to ensure all users of the same shedule dont go on break at the same time
            
            $users_on_same_schedule = ($user->schedule) ? $user->schedule->users : null;
            #make sure sure is not alone on the schedule :)
            if($users_on_same_schedule && $users_on_same_schedule->count() > 1){
                #get users not on break
                $thresh_hold = 1;
                if($users_on_same_schedule->where('has_active_break', false)->count() <= $thresh_hold)
                {
                    return back()->with('warning', "Break not allowed! Your schedule must have at least {$thresh_hold} members on duty.");
                }
            }

            #create break timesheet and logout
            TimeRecord::create([
                'user_id' => Auth::user()->id,
                'started_at' => now(),
                'time_record_type_id' => $time_record_type->id,
                'description' => $request->break_description,
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return Redirect(route('home'))->with('success', "Enjoy your break :)");
        # Abort if record type doesnt match    
        } else {
            return back()->with('error', 'Invalid record type. ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeRecord  $time_record
     * @return \Illuminate\Http\Response
     */
    public function show(TimeRecord $time_record)
    {
        return $time_record->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeRecord  $time_record
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time_record = TimeRecord::find($id);
        return view('time_records.edit', ['time_record' => $time_record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeRecord  $time_record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeRecord $time_record)
    {
        $request->validate([
            'started_at' => 'required',
            'ended_at' => 'required'
        ]);

        $time_record->update([
            'started_at' => $request->started_at,
            'ended_at' => $request->ended_at
        ]);

        return back()->with('success', 'Time Record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeRecord  $time_record
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeRecord $time_record)
    {
        #Disable deletes for now
        return back()->with('Error', 'This action is disabled.');

        // $time_record->delete();
        // return back()->with('success', 'Time record has been deleted successfully!');
    }

    public function close_time_record(Request $request, TimeRecord $time_record){
        $time_record->update(['ended_at'=>now()]);
        return redirect()->route('home')->with('success', "Success: Request has been processed.");
    }
    public function time_tracker($pay_period_start=null, $pay_period_end = null, $users=null){
        
        $pay_period_start   = $pay_period_start ?? ((now()->format('d')<=15)? now()->startOfMonth() : now()->startOfMonth()->addDays(15));
        // dd($pay_period_start);
        $pay_period_end     = $pay_period_end   ?? now();
        $users              = $users            ?? User::whereHas('time_records')->get();

        #Template for creating datasets
        /* 
        $dataset= LazyCollection::make(function () {
                yield $a;
                yield $b;
                yield $c;
        })->collect()->all();
        */
        //  dd($pay_period_start);
        $datasets =  LazyCollection::make(function () use ($pay_period_start, $pay_period_end, $users) {
            foreach ($users as $user) {
                $totals=[
                    'total_time'=>new CarbonInterval(0),
                    'regular_time'=>new CarbonInterval(0),
                    'over_time'=>new CarbonInterval(0),
                ];
                $pto_totals=[];
                #Add keys to our array
                foreach(PtoType::all() as $p){
                    array_push($pto_totals, [$p->name=>null]);
                }
                $pto_totals=$this->array_flatten($pto_totals);

                $records = LazyCollection::make(function () use ($totals, $pto_totals, $pay_period_start, $pay_period_end, $user) {
                    foreach (CarbonPeriod::create($pay_period_start, $pay_period_end) as $mutable_date) {
                        #Make the date immutable
                        $date=CarbonImmutable::make($mutable_date);
                        // dd($pto  s->all());

                        $ptos=[];
                        #Add keys to our array
                        foreach(PtoType::all() as $p){
                            array_push($ptos, [$p->name=>null]);
                        }
                        $ptos=$this->array_flatten($ptos);


                        foreach($user->ptos as $pto){
                            if($date->format('Y-m-d')==Carbon::make($pto->start_at)->format('Y-m-d'))
                            {  
                                #collect local sum for specific day
                                $ptos[$pto->pto_type->name] += $pto->hours; 

                                #collect Global sum for entire pay preiod
                                $pto_totals[$pto->pto_type->name] += $pto->hours; 
                            }
                        }
                        
                        // dd($ptos);

                        // $c=collect();
                        // $c->concat(['something'=>'here']);
                        // dd($c->count());
                        // $collection = collect();
                        // $concatenated = $collection->concat(['Jane Doe']);
                        // dd($concatenated->all());
                        
                        $clock_in_out=$this->construct_clock_in_out_record($date, $user);
                        // dd($clock_in_out);
                        // if ($clock_in_out && count($clock_in_out)>1){
                        //     dd($clock_in_out);
                        // } else continue;
                        
                        $all_breaks=$user->time_records()->where('started_at', '>=', $date->copy()->startOfDay())->where('started_at', '<=', $date->endOfDay())->whereHas('time_record_type', function ($x) {
                            $x->where('name', 'like', '%break%');
                        })->get();
                        // dd($ptos);

                        if ($clock_in_out == null) {
                            continue;
                        }
                        // dd($ptos);

                        $total_break_time=new CarbonInterval(0)  ;
                        if($all_breaks && count($all_breaks)){
                            
                            foreach($all_breaks as $break){
                                $diff=Carbon::make($break->started_at)->diff(Carbon::make(($break->ended_at) ?? ''));
                                $total_break_time->add($diff);
                                // dd($total_break_time);
                            }
                            // dd($total_break_time);
                        // dd($ptos);
                        }
                        $total_time= new CarbonInterval(0);
                        $regular_time=new CarbonInterval(0);
                        $over_time=new CarbonInterval(0);

                        if(isset($clock_in_out)){
                            // dd($clock_in_out);
                            $diff=$clock_in_out->total_diff;
                            $total_time->add($diff)->sub($total_break_time)->cascade();
                            
                            if($total_time->greaterThan(CarbonInterval::make('8h'))){
                                $regular_time=CarbonInterval::make('8h');
                                $over_time = $total_time->copy()->sub($regular_time);
                            }else{
                                $regular_time=$total_time;
                                $over_time=new CarbonInterval(0);
                            }
                        }
                        
                        //   dd (Carbon::make( $total_time->totalSeconds));
                        $totals['total_time']->add( $total_time);
                        $totals['regular_time']->add( $regular_time);
                        $totals['over_time']->add($over_time);

                        // dd($totals['total_time']->cascade());
                        // dd($totals);
                        // if($totals['total_time']->copy()->totalSeconds == 0 && $totals['regular_time']->copy()->totalSeconds == 0 && $totals['over_time']->copy()->totalSeconds == 0){
                        //     continue;
                            
                        // }

                        // dd($ptos);
                        #Add ptos to the array like so to avoid nested array
                        yield array_merge([
                            'date' => $date,
                            'time_records' => $user->time_records()->where('started_at', '>=', $date->copy()->startOfDay())->where('started_at', '<=', $date->endOfDay())->get(),
                            'clock_in_out' => $clock_in_out,
                            'regular_time' => $regular_time,    
                            'total_time' => $total_time,
                            'over_time' => $over_time,
                            // 'ptos'    =>$ptos,
                        ], $ptos);
                    }       
                    // dd($ptos);                             
                    // dd($totals);
                })->collect();
                if($totals['total_time']->copy()->totalSeconds == 0 && $totals['regular_time']->copy()->totalSeconds == 0 && $totals['over_time']->copy()->totalSeconds == 0){
                    #skip erroneous datasets
                    continue;
                        
                }

                yield array_merge([
                    'user' => $user,
                    'records' => $records->all(), 
                    'total_time' => $totals['total_time']->copy()->cascade(),
                    'regular_time' => $totals['regular_time']->copy()->cascade(),
                    'over_time' => $totals['total_time']->sub($totals['regular_time'])->cascade(),
                ], $pto_totals);
            }

        })->collect();
        $datasets->all();

        // usage
        // foreach($datasets as $x){
        //     foreach($x['records'] as $d)
        //     {
        //         dd($d['time_records']);
        //     }
        // }
        
        // $users->flatMap->time_records->each(function($time_record){
        //     $time_record->record_date=$time_record->created_at->format('Y-m-d');
        // });
        // dd('there');
        return view('time_records.time_tracker', ['datasets'=>$datasets, 'pay_period_start'=>$pay_period_start, 'pto_types'=>PtoType::all()]);
    }

    
    public function time_records_filter(Request $request){
        try {
            ( $request->date_from ) ? $date_from = Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d') : null;
            ( $request->date_to ) ? $date_to = Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d') : null;
            $request->merge([
                'formated_date_from'=>$date_from ?? null,
                'formated_date_to'=>$date_to ?? null,
            ]);
            // dd($request->date_from);
            $request->validate([
                'employee_id'=>'nullable|string',
                'department_id'=>'nullable|string',
                'designation_id'=>'nullable|string',
                'manager_id'=>'nullable|string',
                'employee_name'=>'nullable|string',
                'pay_period_start'=>'nullable|date:before_or_equal:today',
                'date_from'=>isset($request->date_to) ? 'required' : 'nullable',
                'date_to'=>isset($request->date_from) ? 'required' : 'nullable',
                'formated_date_from'=>'nullable|date|before_or_equal:formated_date_to',
                'formated_date_to'=>'nullable|date|before_or_equal:today',
            ]);
            // ( $request->date_from ) ? $date_from = Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d') : '';
            // ( $request->date_from ) ? $date_to = Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d') : '';

            
        } catch (\Throwable $th) {
            throw $th;
        }

        #Set dates
        $pay_period_start = CarbonImmutable::make($request->pay_period_start);
        $pay_period_end = null;
        if (isset($pay_period_start)) {
            $pay_period_end = ($pay_period_start->format('d') == 1) ? $pay_period_start->addDays(14) : $pay_period_start->endOfMonth();
        }elseif (isset($request->date_from)) {
            $pay_period_start = $request->formated_date_from;
            $pay_period_end = $request->formated_date_to;
        }
        // dd($pay_period_end);

        #Get Users
        $users_query_builder=null;
        if(isset($request->employee_id)){
            $users_query_builder=User::where('id', $request->employee_id);
        }elseif(isset($request->department_id) || $request->manager || $request->designation || $request->employee_name){
            $users_query_builder=User::all()->toQuery();
            #Filters are applied in sequence. manager, dpt, designation, name

            if(isset($request->manager_id)){
                #implement teams first
            }
            if(isset($request->department_id)){
                $users_query_builder = $users_query_builder->whereHas('designation.department', fn($qb)=>$qb->where('id',$request->department_id));
            }
            if(isset($request->designation_id)){
                $users_query_builder = $users_query_builder->where('designation_id', $request->designation_id);
            }
            if(isset($request->designation_id)){
                $users_query_builder = $users_query_builder->where('designation_id', $request->designation_id);
            }

            if(isset($request->employee_name)){
                $users_query_builder->where('fname', 'like', "%{$request->employee_name}%")
                    ->orwhere('mname', 'like', "%{$request->employee_name}%")
                    ->orwhere('lname', 'like', "%{$request->employee_name}%");
            }
        }
        $users = ($users_query_builder) ? $users_query_builder->get() : null;
        
        $datasets = $this->time_tracker(
            pay_period_start:$pay_period_start,
            pay_period_end:$pay_period_end,
            users:$users
        );
        // dd(isset($request->pay_period_start) ? new CarbonImmutable($request->pay_period_start) : null);
        return view('time_records.time_tracker', [
            'datasets'=>$datasets->datasets, 
            'pay_period_start'=>now(), 
            'pto_types'=>PtoType::all(), 

            'employeeId'=>$request->employee_id,
            'departmentId'=>$request->department_id,
            'designationId'=>$request->designation_id,
            'managerId'=>$request->manager_id,
            'pay_period'=>isset($request->pay_period_start) ? new CarbonImmutable($request->pay_period_start) : null,
            'name'=>$request->employee_name,
            'start_date'=>($request->date_from) ? CarbonImmutable::createFromFormat('d/m/Y',$request->date_from) : null,
            'end_date'=>($request->date_to) ? CarbonImmutable::createFromFormat('d/m/Y',$request->date_to) : null,
        ]);
    }

    public function adjust_time_tracker(Request $request){
        $request->validate([
            'time_out'=>'required',
            'time_in'=>'required',
        ]);
        $time_tracker = 
        dd($request->all());
    }
    
}
