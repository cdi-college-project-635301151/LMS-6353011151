<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;
    protected $table = "tbl_categories";
    protected $primaryKey = "category_code";
    protected $keyType = "string";
    protected $fillable = ["category_code", "short_desc", "long_desc", "is_enabled"];
}
