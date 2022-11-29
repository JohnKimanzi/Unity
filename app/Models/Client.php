<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    Use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at, date_onboarded'];  


    protected $fillable = [
        'code',
        'collector_id',
        'company_id',
        'percentage_rate',
        'status',
        'date_onboarded',
    ];

    public function action_codes(){
        return $this->morphToMany(ActionCode::class, 'actionable');
    }//returns all action codes

    public function company(){
        return $this->belongsTo(Company::class);
    }
    
    public function contacts(){
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function notes(){
        return $this->morphMany(Note::class, 'notable');
    }

    public function uploads(){
        return $this->morphMany(Upload::class, 'uploadable');
    }
    
    public function collector(){
        return $this->belongsTo(User::class, 'collector_id');
    }

    public function state(){
        return $this->belongsTo(State::class);
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
    
    // public function debtors(){
    //     return $this->belongsToMany(Debtor::class);
    // }

    public function debts(){
        return $this->hasMany(Debt::class);
    }

    public function getPrimaryContactAttribute(){
        $pcp= $this->contacts()->where('tag', 'primary')->first();
        if ($pcp==null) {
            $pcp=$this->contacts()->first();
        }
        return $pcp;
    }
    
    public function getPrimaryPhoneAttribute(){
        $pc= $this->phones()->where('tag', 'primary')->first();
        if ($pc==null) {
            $pc=$this->phones()->first();
        }
        return $pc;
    }

    public function getPrimaryEmailAttribute(){
        $p_email= $this->emails()->where('tag', 'primary')->first();
        if ($p_email==null) {
            $p_email=$this->emails()->first();
        }
        return $p_email;
    }

    public function getNameAttribute(){
        return $this->company->name;
    }

    public function getPrimaryAddressAttribute(){  
        $pa= $this->addresses()->where('tag', 'primary')->first();
        if ($pa==null) {
            $pa=$this->addresses()->first();
        }
        return $pa;
    }

}
