<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Call extends Model
{
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'call_back', 'deleted_at',
    ];
    protected $fillable=[
        'user_id',
        'lead_id',
        'duration',
        'call_back',
        'status',
        'action_codes',
        'description',
        'contact_person_id',
        'phone',
        'subject',
        'user_id'
    ];
    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
    public function contact_person()
    {
        return $this->belongsTo(ContactPerson::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Meeting()
    {
        return $this->hasMany(Meeting::class);
    }
}
