<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTypeModel extends Model
{
    use HasFactory;
    protected $table = "tbl_document_type";
    protected $fillable = ["doc_type_code", "short_desc", "is_enabled"];
}
