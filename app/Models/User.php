<?php

namespace App\Models;

use App\Http\Controllers\TimeRecordTypeController;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasFactory, Notifiable, AuthenticationLoggable;
    use HasRoles;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'dob', 'doj'];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_status' =>'boolean',
        'status' => 'boolean',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'email',
        'personal_email',
        'phone1',
        'phone2',
        'dob',
        'gender',
        'password',
        'designation_id',
        'country_id',
        'address',
        'city',
        'state_id',
        'zip_code',
        'team_id',
        'status',
        'supervisor_id',
        'doj',
        'pay_rate',
        'password_changed_at',
        'password_status',
        'employee_schedule_id',
    ];
    
    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
    public function calls()
    {
        return $this->hasMany(Call::class);
    }
    public function state ()
    {
        return $this->belongsTo(State::class);
    }
  
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function country ()
    {
        return $this->belongsTo(Country::class);
    }

    public function clients(){
        return $this->hasMany(Client::class, 'collector_id');        
    }
    public function pto_allocations(){
        return $this->hasMany(PtoAllocation::class);        
    }
    public function supervisor(){
        return $this->belongsTo(User::class, 'supervisor_id');        
    }
    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function leads(){   
        if ($this->hasRole('closer')){
            // dd('user');
            return $this->hasMany(Lead::class,'closer_id');
        }else return $this->hasMany(Lead::class,'sales_rep_id');
    }
    public function closed_deals(){
        return $this->hasMany(Lead::class,'closer_id');
    }
    public function time_offs(){
        return $this->hasMany(TimeOff::class);
    }
    public function time_records(){
        return $this->hasMany(TimeRecord::class);
    }
    public function getNameAttribute(){
        return "{$this->fname} {$this->mname} {$this->lname}";
    }

    public function getMyClientsAttribute(){
        $leads = $this->leads()->whereHas('company.client')->get();
        $clients=[];
        if(!is_null($leads)){
            foreach($leads as $lead){
                if(isset($lead->company->client)){
                    $clients[]=$lead->company->client;
                }
            }
        }
        return $clients;
    }

    // public function GetClockIn($date){
    //     $date=Carbon::make($date);
    //     return $this->time_offs()->where();
    // }

    public function getDepartmentAttribute () 
    {
        return $this->designation->department;
    }
    public function getUserAgeAttribute(){
        $years=now()->diffInYears($this->dob);
        return $years;
    }

    /*=============================================================================================================================
                                     TIMESHEETS
    =============================================================================================================================*/
    public function getTimeSheetsTodayAttribute(){
        $timesheets_today = $this->time_records()->where('started_at', '>=', now()->startOfDay())->get();
        return $timesheets_today;
    }

    public function getActiveTimeRecordsAttribute(){
        // $time_records = $this->time_records()->where('ended_at', null)->where('started_at', '>=', now()->subHours(24))->get();
        $active_timesheets=collect();
        if ($this->time_sheets_today->count() > 0 ) {
            
            $active_timesheets=$this->time_sheets_today->toQuery()->where('ended_at', null)->get();
        }
        return $active_timesheets;
    }

    public function getActiveClockInAttribute(){
        $timesheet= null;
        if ($this->active_time_records->count() > 0 ) {
            $timesheet=$this->active_time_records->toQuery()->whereHas('time_record_type', function($timesheet_type){
                $timesheet_type->where('name', 'like', '%clock%');
            })->get();
        }       
        return $timesheet;
    }

    public function getIsClockedInAttribute()
    {
        $status=false;
        if(isset($this->active_clock_in)){
            $status=true;
        }
        return $status;
    }
    public function getActiveBreakAttribute(){
        $timesheet=null;
        if ($this->active_time_records->count() > 0 ) {
            $timesheets =$this->active_time_records->toQuery()->whereHas('time_record_type', function($timesheet_type){
                $timesheet_type->where('name', 'like', '%break%');
            })->get();

            #if we get more than 1 record return null(error)
            if($timesheets->count() > 1){
                $timesheet = null;
            }else $timesheet= $timesheets->first();
        }       
        return $timesheet;
    }

    public function getHasActiveBreakAttribute()
    {
        $status=false;
        if($this->active_break){
            $status=true;
        }
        return $status;
    }

    public function getBreaksTodayAttribute(){
        $timesheets = $this->time_records()
        ->where('started_at', '>', now()->startOfDay())
        ->get();
        return $timesheets;
    }

    public function getAllowedBreakTypesAttribute(){
        if(! $this->is_clocked_in){
            return TimeRecordType::where('name', 'like', '%clock%')->get();
        }else{
            #return all breaktypes that are not custom break and have not been taken by user today
            #More rules to come when shedule is implemented
            $schedule_breaks=$this->schedule->breaks()->whereNotIn(
                    'id', 
                    $this->breaks_today->pluck('time_record_type.id')->toArray()
                )
            ->whereNotIn('time_record_type_id', TimeRecordType::where('name', 'like', '%custom%')->pluck('id'))
            ->get();
            
            return $schedule_breaks->map(fn($break)=>$break->time_record_type);
        }
    }

    /*=============================================================================================================================
                                     END TIMESHEETS
    =============================================================================================================================*/

    public function ptos ()
    {
        return $this->hasMany(Pto::class);
    }

    public function getPasswordIsValidAttribute(){
        $status=false;
        if($this->password_changed_at != null && $this->password_status){
            $status= true;
        }
        return $status;
    }

    public function schedule(){
        return $this->belongsTo(EmployeeSchedule::class, 'employee_schedule_id');
    }
    
}
