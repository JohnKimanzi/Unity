<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  

    protected $fillable = [
        'emailable_id',
        'emailable_type',
        'address',
        'tag',
        'description',
    ];

    public function contactable(){
        return $this->morphTo();
    }

}
