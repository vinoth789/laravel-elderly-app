<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalFunctions extends Model
{
    protected $table = 'physical_functions';
    protected $fillable = [
        'pf_id',
        'user_id',
        'holding_positions',
        'changing_positions',
        'walking',
        'climbing_stairs',
        'known_pain',
        'unknown_pain',
        'fall_asleep',
        'sleeping_duration',
        'physical_results',
    ]; 
}
