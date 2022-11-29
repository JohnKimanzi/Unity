<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TimeOff extends Model
{
    use HasFactory;
    use Uuids;

    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  
    protected $fillable = [
        'id',
        'user_id',
        'time_off_type_id',
        'start',
        'end',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function time_off_type(){
        return $this->belongsTo(TimeOffType::class);
    }
}
