<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\TimeRecordType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    
        // dd( User::find(1)->has_active_break);    
        //check if user has active break. if yes redirect prompt user to end break before proceeding
        $active_time_records=Auth::user()->time_records()->where('ended_at', null)->where('started_at', '>=', now()->subHours(24))->get();
        if(!$active_time_records->first()){
            //prompt to clock in
            return view('time_records.pre_login', [
                'title'=>'You are not clocked in!', 
                'text'=>'Clock in to access the system',
                'time_record_types'=>TimeRecordType::where('name', 'like', '%clock%')->get(),
                'allowed_time_record_type'=>TimeRecordType::where('name', 'like', '%clock%')->first()
            ]);
        }
        $clock_ins=$active_time_records->toQuery()->whereHas('time_record_type', function($x){
            $x->where('name', 'like', '%clock%');
        })->get();
        $breaks=$active_time_records->toQuery()->whereHas('time_record_type', function($x){
            $x->where('name', 'like', '%break%');
        });
        
        if(!$clock_ins->first()){
            //prompt to clock in
            return view('time_records.pre_login',['title'=>'You are not clocked in!', 'text'=>'Clock in to access the system','allowed_time_record_type'=>TimeRecordType::where('name', 'like', '%clock%')->first(),'time_record_types'=>TimeRecordType::where('name', 'like', '%clock%')->get()]);
        }
        if($breaks->first()){
            // prompt to end break
            // dd($breaks->get());
            return view('time_records.pre_login', ['title'=>'End active break', 'text'=>'You have an active break! End it to proceed', 'time_record_types'=>[], 'allowed_time_record_type'=>'']);
        }
        
        // use designations together with roles
        $designation_id=(Auth::user()->designation->id) ?? 0;
        if(!Auth::User()->designation_id){

        }
        if ($designation_id && $designation_id == Designation::where('name', 'like', '%sales rep%')->first()->id) {
            return view('dashboards.sales_rep');
        }
        elseif($designation_id && $designation_id == Designation::where('name', 'like', '%collector%')->first()->id){
            return view('dashboards.collector');
        }
        elseif($designation_id && $designation_id == Designation::where('name', 'like', '%closer%')->first()->id){
            return view('dashboards.closer');
        }
        elseif($designation_id && $designation_id == Designation::where('name', 'like', '%team leader%')->first()->id){
            return view('dashboards.team_leader');
        }
    
        else{
            if (Auth::user()->hasRole('admin')) {
                return view('dashboards.admin');
            }
            elseif(Auth::user()->hasRole('team leader')) {
                return view('dashboards.team_leader');
            }
            elseif(Auth::user()->hasRole('collector'))            {
                return view('dashboards.collector');
            }
            elseif(Auth::user()->hasRole('sales rep'))            {
                return view('dashboards.sales_rep');
            }
            else {
                return view('dashboards.index');
            }
        }
        
    }
    
}
