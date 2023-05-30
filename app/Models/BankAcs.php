<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAcs extends Model
{
    protected $table = 'bank_details';
    protected $fillable = [
        'mem_id',
        'acct_name',
        'acct_no',
        'bank',
        'branch',
        'bank_address',
        'address',
        'swift_code',
        'IFSC_Code',
        'book_image',
        'pan_number',
        'pan_card',
        'types',
        'created_by'
    ];
}
