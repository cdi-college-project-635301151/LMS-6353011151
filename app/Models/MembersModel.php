<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersModel extends Model
{
    use HasFactory;
    protected $table = "tbl_members";
    protected $fillable = ['first_name', 'last_name', 'telephone', 'email'];
    protected $primaryKey = "member_id";
    protected $keyType = "int";
}
