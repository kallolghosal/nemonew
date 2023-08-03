<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelModel extends Model
{
    protected $table = 'travel_details';
    public $timestamps = false;
    protected $fillable = [
        'mem_id',
        't_date',
        't_from',
        't_to',
        't_node',
        't_status',
        'rematks',
        't_pnr_no',
        'agent_name',
        't_port_agent',
        'amount',
        'created_by'
    ];
}
