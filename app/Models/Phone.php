<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
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
        'phonable_id',
        'phonable_type',
        'number',
        'extension',
        'tag',
        'description',
    ];
    public function phonable()
    {
        return $this->morphTo();
    }
}
