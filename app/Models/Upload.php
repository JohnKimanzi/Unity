<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];  
    
    protected $fillable = [
        'name',
        'uploadable_type',
        'uploadable_id',
        'document_id',
      ];

    public function uploadable()
    {
        return $this->morphTo();
    }
    public function document()
    {
      return $this->belongsTo(Document::class);
    }
}
