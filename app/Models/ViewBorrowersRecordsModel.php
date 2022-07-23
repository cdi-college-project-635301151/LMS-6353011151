<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewBorrowersRecordsModel extends Model
{
    use HasFactory;
    protected $table = 'vw_borrowers_record';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
}
