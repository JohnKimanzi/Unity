<?php

namespace App\Models;

use App\Traits\CustomGlobalFunctions;
use App\Traits\Uuids;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pto extends Model
{
    use HasFactory, Uuids, CustomGlobalFunctions;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at', 
        'start_at', 
        'end_at'
    ];  

    protected $fillable= [
        'pto_type_id',
        'user_id',
        'start_at',
        'end_at',
        'status',
        'modified_by_user_id',
        'comments',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function updated_by(){
        return $this->belongsTo(User::class, 'modified_by_user_id');
    }
    public function pto_type(){
        return $this->belongsTo(PtoType::class, 'pto_type_id');
    }
    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }
    public function getHoursAttribute(){
        $total_diff=new CarbonInterval(0);
        $start_date=Carbon::make($this->start_at); 
        $end_date=Carbon::make($this->end_at) ;
        // dd($end_date);
// dd($end_date);
// dd($start_date.' - '.$end_date.' = '.CarbonInterval::make($start_date->diff($end_date)));
        #Just making sure we have sane values :)
        if(CarbonInterval::make($start_date->diff($end_date))->totalSeconds <1) {
            return 0;
        }
        $period=CarbonPeriod::create($start_date, $end_date);
        $i=0;
        foreach($period as $date){
            // $date = CarbonImmutable::create($date);
            if( $this->isWorkDay($date, $this->user)){
                // dd('here');
                $i++;
                if($i==1){
                    // dd($total_diff);
                    #First Day
                    // dd($date);
                    $total_diff->add(CarbonInterval::make($start_date->diff($this->endOfWorkDay($date , $this->user))));
                    // dd($this->endOfWorkDay($date , $this->user));
                }
                else if($i==$start_date->diffInDays($end_date)){
                    #Fast Day
                    $total_diff->add(CarbonInterval::make($this->startOfWorkDay($date , $this->user)->diff($end_date)));
                }else{
                    $total_diff->addHours($this->workHours($date, $this->user));
                }
            }
        }
        // dd($total_diff->totalSeconds);   
        return ($total_diff->totalSeconds <> 0 ) ? round($total_diff->totalSeconds/3600, 2) : 0;
    }
}
