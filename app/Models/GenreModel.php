<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    use HasFactory;
    protected $table = "tbl_genre";
    protected $fillable = ['genre_code', 'short_desc', 'long_desc', 'is_enabled'];
}
