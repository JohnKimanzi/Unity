<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeRecordType extends Model
{
    use HasFactory, Uuids;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  

    protected $casts = [
        'is_paid' => 'boolean',
    ];
    
    protected $fillable=[
        'name', 
        'description',
        'is_paid'
    ];

    public function time_records(){
        return $this->hasMany(TimeRecord::class);
    }
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function GetActionNameAttribute()
    {
        if(Str::contains(Str::lower($this->name), 'clock'))
        {
            if(Auth::check() && Auth::user()->is_clocked_in){
                return 'Clock Out';
            }else return 'Clock In';
        }else return $this->name;
    }
}
