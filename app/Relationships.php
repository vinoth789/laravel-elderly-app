<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationships extends Model
{
    protected $table = 'relationships';
    protected $fillable = [
        'r_id',
        'user_id',
        'f_family',
        'f_friends',
        'f_partnership',
        'f_nursing_staff',
        'f_acquaintances',
        'e_family',
        'e_friends',
        'e_partnership',
        'e_nursing_staff',
        'e_acquaintances',
        'relationships_results',
    ]; 
}
