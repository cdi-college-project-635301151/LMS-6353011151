<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_documents';
    protected $fillable = [
        'document_code', 'doc_type_code', 'maturity_code',
        'genre_code', 'category_code', 'is_enabled'
    ];
}
