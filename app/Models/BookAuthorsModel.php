<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthorsModel extends Model
{
    use HasFactory;
    protected $table = "tbl_book_authors";
    protected $primary_key = "author_code";
    protected $keyType = "string";
    protected $fillable = ['author_code', 'first_name', 'last_name', 'is_enabled'];
}
