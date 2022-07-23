<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewDocumentsModel extends Model
{
    use HasFactory;
    protected $table = 'vw_documents';
    protected $primaryKey = 'document_code';
    protected $keyType = 'string';
}
