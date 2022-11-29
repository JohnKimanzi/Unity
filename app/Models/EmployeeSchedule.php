<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSchedule extends Model
{
    use HasFactory, Uuids, SoftDeletes;
    protected $dates= ['deleted_at','effective_from', 'effective_to'];
    protected $fillable = [
        'name',
        'description',
        'effective_from',
        'effective_to',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function employees(){
        return $this->hasMany(User::class);
    }

    public function breaks(){
        return $this->hasMany(ScheduleBreak::class);
    }

    public function getActiveUsersAttribute(){
        $active_users=collect();
        $this->users->each(function($user)use($active_users){
            if(! $user->has_active_break){
                $active_users->push($user);
            }
        });
        return $active_users;
    }
}
