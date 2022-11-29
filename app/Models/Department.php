<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, Uuids;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  
    protected $fillable = [
        'name', 
        'description'
    ];

    public function users () 
    {
        return $this->hasManyThrough(
            User::class,          //model wishing to access
            Designation::class,   //intermediate model
            'department_id',      //foreign key of intermediate model
            'designation_id',     //foreign key of user model
            'id',                //local key on the department model
            'id'                //local key of intermediate model
        );
    }
}
