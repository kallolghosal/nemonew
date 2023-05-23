<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $table = 'vsl_name';
    protected $fillable = [
        'vsl_name',
        'company'
    ];
}
