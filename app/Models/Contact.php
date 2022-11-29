<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
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
        'contactable_id',
        'contactable_type',
        'salutation',
        'first_name',
        'last_name',
        'designation',
        'tag',
        'comments',
    ];

    public function contactable()
    {
        return $this->morphTo();
    }

    public function addresses(){
        return $this->morphMany(Address::class, 'addressable');
    }

    public function emails(){
        return $this->morphMany(Email::class, 'emailable');
    }

    public function phones(){
        return $this->morphMany(Phone::class, 'phonable');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
    public function getNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
