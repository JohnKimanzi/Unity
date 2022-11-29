<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Pto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PtoType extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $casts = [
        'can_roll_over',
    ];

    protected $fillable=[
        'name',
        'max_hours',
        'can_roll_over',
        'max_roll_over',
        'attachment_required',
        'status',
    ];
     
    public function ptos(){
        return $this->hasMany(PTO::class);
    }

 

    // public function users(){
    //     return $this->hasManyThrough(User::class, PtoAllocation::class);
    // }
    
}
