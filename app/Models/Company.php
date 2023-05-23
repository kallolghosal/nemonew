<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'company_name',
        'contact_person',
        'address',
        'phone',
        'emaiol',
        'b_type',
        'management',
        'last_update'
    ];
}
