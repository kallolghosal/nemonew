<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    protected $table = 'country_phone';
    protected $fillable = [
        'country',
        'code',
        'phone'
    ];
}
