<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfCare extends Model
{
    protected $table = 'self_care';
    protected $fillable = [
        's_id',
        'user_id',
        'pf_results',
        'cf_results',
        'r_results',
        'e_results',
        'nutrition',
        'hygiene',
        'household', 
        'participation',
        'self_determination',
        'self_care_results', 

    ]; 
    public $timestamps = false;
}
