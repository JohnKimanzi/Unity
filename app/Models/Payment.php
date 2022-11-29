<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Payment extends Model
{
    use Uuids;
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'payment_date'];  
    
    protected $fillable = [
        'amount',
        'debt_id',
        'payment_method',
        'payment_date',
        'paid_by',
    ];
    public function debt(){
        return $this->belongsTo(Debt::class);
    }
    // public function ()
}
