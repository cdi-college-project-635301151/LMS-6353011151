<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsModel extends Model
{
    use HasFactory;
    protected $table = "tbl_authors";
    protected $fillable = ['author_code', 'author_name', 'is_enabled'];
}
