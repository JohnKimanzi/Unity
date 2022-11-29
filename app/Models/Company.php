<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    Use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_commercial' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'state_id',
        'business_type_id',
        'status',
        'is_commercial',
    ];
    
    public function lead(){
        return $this->hasOne(Lead::class);
    }
    
    public function client(){
        return $this->hasOne(Client::class);
    }
    
    public function state(){
        return $this->belongsTo(State::class);
    }
    
    public function business_type(){
        return $this->belongsTo(BusinessType::class);
    }

    public function uploads()
    {
        return $this->morphMany(upload::class, 'uploadable');
    }
}

