<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksMaturityModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_books_maturity';
    protected $primaryKey = 'maturity_code';
    protected $keyType = 'string';
    protected $fillable = ['maturity_code', 'short_desc', 'long_desc', 'is_enabled'];
    protected $connection = 'mysql';
}
