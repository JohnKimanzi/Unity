<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionType extends Model
{
    use Uuids;
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  

    protected $cats = [
        'is_reduce_balance' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'is_reduce_balance',
        'description',
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
