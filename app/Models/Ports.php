<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ports extends Model
{
    protected $table = 'port_name';
    protected $fillable = [
        'port'
    ];
}
