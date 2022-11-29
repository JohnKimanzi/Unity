<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nevadskiy\Position\HasPosition;

class ScheduleBreak extends Model
{
    use HasFactory, Uuids, SoftDeletes, HasPosition;

    protected function newPositionQuery()
    {
        return $this->newQuery()->where('employee_schedule_id', $this->employee_schedule_id);
    }

    public function getInitPosition(): int
    {
        return 1;
    }

    public function alwaysOrderByPosition(): bool
    {
        return true;
    }

    protected $dates=[
        'deleted_at',
    ];

    protected $fillable=[
        'position',
        'time_record_type_id',
        'employee_schedule_id',
        'earliest_time_out',
        'latest_time_out',
        'max_breaks_daily',
        'total_number_of_hours',
    ];

    public function time_record_type(){
       return $this->belongsTo(TimeRecordType::class); 
    }

    public function employee_schedule(){
        return $this->belongsTo(EmployeeSchedule::class); 
    }
    
}
