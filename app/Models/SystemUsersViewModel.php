<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUsersViewModel extends Model
{
    use HasFactory;
    protected $table = 'vw_system_users';
    protected $primaryKey = 'member_code';
    protected $keyType = 'string';
}
