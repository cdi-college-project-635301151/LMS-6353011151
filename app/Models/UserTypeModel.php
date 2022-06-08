<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypeModel extends Model
{
    use HasFactory;
    protected $table = "tbl_user_types";
    protected $primaryKey = "user_type_id";
    protected $keyType = "int";
    protected $fillable = ['description', 'is_active'];
}
