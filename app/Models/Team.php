<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  
    protected $fillable=[
        'name',
        'description',
        'code',
        'country_id',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}
