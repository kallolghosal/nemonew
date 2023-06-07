<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portagents extends Model
{
    protected $table = 'port_agent';
    public $timestamps = false;
    protected $fillable = [
        'port_agent',
        'c_person',
        'address',
        'phone',
        'email',
        'city',
        'state',
        'other_state',
        'country'
    ];
}
