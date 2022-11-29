<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactPerson extends Model
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
        'id_number',
        'title',
        'contact_type',
        'client_id',
        'lead_id',
        'first_name',
        'last_name',
        'salutation',
        'email',
        'physical_address',
        'phone',
        'comments'
    ];
    public function lead(){
        return $this->belongsTo(Lead::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
    public function getNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }
}
