<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotions extends Model
{
    protected $table = 'emotions';
    protected $fillable = [
        'e_id',
        'user_id',
        'motivation',
        'high_mood',
        'relaxation',
        'indifference',
        'sadness',
        'frustration',
        'emotions_results', 

    ]; 
}
