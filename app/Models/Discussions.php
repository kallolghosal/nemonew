<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussions extends Model
{
    protected $table = 'discussion';
    protected $fillable = [
        'companyname',
        'join_date',
        'mem_id',
        'discussion',
        'reason',
        'post_by',
        'reminder',
        'r_date',
        'created_date'
    ];
}
