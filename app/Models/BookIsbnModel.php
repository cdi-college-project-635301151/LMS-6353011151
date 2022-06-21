<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIsbnModel extends Model
{
    use HasFactory;
    protected $table = "tbl_books_isbn";
    protected $fillable = ["isbn_code", "isbn_desc", "short_desc", "is_enabled"];
}
