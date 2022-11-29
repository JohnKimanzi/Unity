<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtoAllocation extends Model
{
    use HasFactory, Uuids;

    protected $dates = ['deleted_at'];

    protected $casts = ['can_roll_over' => 'boolean'];
     
    protected $fillable = [
        'user_id',
        'record_year',
        'pto_type_id',
        'allocated_hours',
        'can_roll_over',
        'max_roll_over'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pto_type(){
        return $this->belongsTo(PtoType::class);
    }
}
