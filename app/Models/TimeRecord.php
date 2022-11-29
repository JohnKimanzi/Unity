<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TimeRecord extends Model
{
    use HasFactory, Uuids;

    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'started_at',
        'ended_at'
    ];  

    protected $fillable=[
        'user_id',
        'started_at',
        'ended_at',
        'time_record_type_id',
        'description',
    ];
    
    public function time_record_type(){
        return $this->belongsTo(TimeRecordType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getIsActiveAttribute(){
        $status=true;
        if($this->ended_at != null ){
            $status=false;
        }
        else{
            try {
                Carbon::make($this->ended_at);
            } catch (\Throwable $th) {
                $status=false;
            }
        }
        return $status;
    }
    
    public function getDiffAttribute(){
        $ended_at=now();
        if(!$this->is_active)
            $ended_at=Carbon::make($this->ended_at);
        $diff= Carbon::make($this->started_at)->diff($ended_at);
        return new CarbonInterval($diff);
    }

    public function getHoursAttribute(){
        return ($this->diff->totalSeconds<>0) ? round( (float)$this->diff->totalSeconds/3600, 2) : 0;
    }

    public function getNameAttribute(){
        return $this->time_record_type->name;
    }
}
