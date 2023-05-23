<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'nemo_country';
    protected $fillable = [
        'code',
        'country',
        'country_code',
        'phone_code'
    ];
}
