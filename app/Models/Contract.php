<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';
    public $timestamps = false;
    protected $fillable = [
        'c_rank',
        'c_company',
        'c_vslname',
        'c_vessel',
        'c_sign_on_port',
        'c_sign_on',
        'c_wages_start',
        'c_eoc',
        'c_sign_off',
        'c_sign_off_port',
        'c_reason_sign_off',
        'c_wages',
        'c_currency',
        'c_wages_types',
        'files',
        'aoa',
        'created_by'
    ];
}
