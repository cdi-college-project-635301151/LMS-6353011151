<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRecordsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_document_records';
    protected $fillable = [
        'document_code', 'doc_title',
        'short_desc', 'isbn_number', 'author_code', 'publication_year',
        'quantity', 'is_enabled'
    ];
}
