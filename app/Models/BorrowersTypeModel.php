<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowersTypeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_borrowers_type';
    protected $primaryKey = 'borrower_type_id';
    protected $fillable = ['description', 'is_enabled'];
}
