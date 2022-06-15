<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIsbnModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_book_isbn';
    protected $fillable = ['isbn_code', 'isbn_desc', 'is_enabled'];
}
