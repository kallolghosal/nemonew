<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewPlanner extends Model
{
    protected $table = 'newentry';
    public $timestamps = false;
    protected $fillable = [
        'rank',
        'client',
        'vessel',
        'vslname',
        'coc_accepted',
        'trading',
        'wages',
        'doj',
        'immediate',
        'other_info',
        'status',
        'created_by',
        'updated_by',
        'created_date'
    ];
}
