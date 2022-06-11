<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewMembersModel extends Model
{
    use HasFactory;
    protected $table = 'vw_members';
    protected $primaryKey = 'member_code';
    protected $keyType = 'string';
}
