<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table = 'results';
    protected $fillable = [
        's_id',
        'user_id',
        'pf_results',
        'cf_results',
        'r_results',
        'e_results',
        'sc_results',
        'external_variable',
        'well_being', 
        'quality_of_life', 

    ]; 
}
