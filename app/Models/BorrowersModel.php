<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowersModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_borrowers';
    protected $fillable = ['member_code', 'document_code', 'from_date', 'to_date', 'is_checked_out', 'is_returned', 'status', 'remarks', 'borrower_type'];
}
