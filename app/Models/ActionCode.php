<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionCode extends Model
{
    use HasFactory;
    Use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; 

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_blinking' =>'boolean',
        'is_strike_through' =>'boolean',
        'is_bold' => 'boolean',
        'is_bold' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'status', #should be changed to bool
        'text_color',
        'bg_color',
        'is_blinking',
        'is_strike_through',
        'is_underline',
        'is_bold',
    ];

    public function clients(){
        return $this->morphedByMany(Client::class, 'actionable');
    }//returns all clients

    public function leads(){
        return $this->morphedByMany(Lead::class, 'actionable');
    }//returns all leads


    public function debts(){
        return $this->morphedByMany(Debt::class, 'actionable');
    }//returns all accounts
}
