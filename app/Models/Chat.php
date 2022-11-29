<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
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
        'sender_id',
        'recepient_id',
        'chat',
        
        'attachment',

    ];

    public function sender(){
        $this->belongsTo(User::class,'sender_id');
    }
    public function recepient(){
        $this->belongsTo(User::class,'recepient_id');
    }
}
