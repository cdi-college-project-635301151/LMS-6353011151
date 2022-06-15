<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksGenreModel extends Model
{
    use HasFactory;
    protected $table = "tbl_books_genre";
    protected $primaryKey = 'genre_code';
    protected $keyType = 'string';
    protected $fillable = ['genre_code', 'short_desc', 'long_desc', 'is_enabled'];
}
