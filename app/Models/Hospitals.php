<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
    protected $table = 'hospital';
    protected $fillable = [
        'hospital',
        'doctor_name',
        'address',
        'city',
        'state',
        'phone',
        'email',
        'upload_file'
    ];
}
