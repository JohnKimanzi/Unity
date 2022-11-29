<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentOLD extends Model
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
        'lead_id',
        'file_path',
      ];
  
      public function Document()
      {
        return $this->belongsTo(Lead::class);
      }
}
