<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
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
        'title',
        'description',
        'from',
        'to',
        'lead_id',
        'reminder_mode',
        'reminder_time',
      ];

      public function meeting(){
        return $this->belongsTo(Lead::class);
    }
    public function Call(){
      return $this->belongsTo(Call::class);
  }
}

