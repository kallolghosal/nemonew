<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'grade';
    public $timestamps = false;
    protected $fillable = [
        'grade'
    ];
}
