<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CognitiveFunctions extends Model
{
    protected $table = 'cognitive_functions';
    protected $fillable = [
        'cf_id',
        'user_id',
        'expresiion',
        'understanding',
        'concentration',
        'memory',
        'orientation',
        'cognitive_results', 

    ]; 
}
