<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date_onboarded'];  
    protected $fillable = [
        'name',
        'business_type_id',
        'phone1',
        'phone2',
        'email',
        'state_id',
        'town',
        'zip_code',
        'address',
        'batch_id',
        'status',
        'company_id',
        'date_onboarded',
    ];

    public function action_codes(){
        return $this->morphToMany(ActionCode::class, 'actionable');
    }//returns all action codes
    
    public function closer(){
        return $this->belongsTo(User::class, 'closer_id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }
    public function sales_rep(){
        return $this->belongsTo(User::class,'sales_rep_id');
    }
    public function business_type(){
        return $this->belongsTo(BusinessType::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function calls(){
        return $this->hasMany(Call::class);
    }
    public function ContactPeople()
    {
        return $this->hasMany(ContactPerson::class);
    }
    public function getPrimaryContactAttribute()
    {
        $pcp= $this->ContactPeople()->where('contact_type', 'primary')->first();
        if ($pcp==null) {
            $pcp=$this->ContactPeople()->first();
        }
        return $pcp;
    }
    public function document()//remove this
    {
      return $this->hasMany(Document::class);
    }

    public function meetings()
    {
      return $this->hasMany(Meeting::class);
    }
    public function client()
    {
      return $this->hasOne(Client::class);
    }
    public function getAgentAttribute(){
        return $this->sales_rep;
    }
}
