<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadBatch extends Model
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
        'user_id',
        'source',
        'count',
    ];
    public function leads()
    {
        return $this->hasMany(Lead::class, 'batch_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
