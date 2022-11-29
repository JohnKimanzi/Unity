<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debtor extends Model
{
    use HasFactory, Uuids;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }

    public function phones()
    {
        return $this->morphMany(Phone::class, 'phonable');
    }
    
    public function debts()
    {
        return $this->belongsToMany(Debt::class)->withTimestamps()->withPivot('tag');
    }//using many to many to many relationships

    public function GetPrimaryDebtsAttribute()
    {
        return $this->debts->where(function($query){
            $query->pivot()->where('tag', 'primary');
        })->get();
    }//where am this is codebtor

    public function GetSecondaryDebtsAttribute()
    {
        return $this->debts->where(function($query){
            $query->pivot()->where('tag', 'primary');
        })->get();
    }//where this is primary debtor

    public function getPrimaryPhoneAttribute()
    {
        $primary_phone = $this->phones()->where('tag', 'primary')->first();
        if ($primary_phone==null) {
            $primary_phone= $this->phones()->first();
        }
        return $primary_phone;
    } 
    public function getPrimaryEmailAttribute()
    {
        $primary_email = $this->emails()->where('tag', 'primary')->first();
        if ($primary_email==null) {
            $primary_email= $this->emails()->first();
        }
        return $primary_email;
    } 
    public function getActiveDebtAttribute()
    {
        return $this->debts->where('status', 'active')->first();
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function getPrimaryAddressAttribute()
    {
        
        $pa= $this->addresses()->where('tag', 'primary')->first();
        if ($pa==null) {
            $pa=$this->addresses()->first();
        }
        return $pa;
    }
}
