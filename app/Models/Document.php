<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'document_type_id',
        'user_id',
        'filename',
        'path',
        'mime',
        'size',
    ];
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function upload()
    {
        return $this->hasOne(Upload::class);
    }
    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
