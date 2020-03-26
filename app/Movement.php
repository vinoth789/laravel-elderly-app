<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements';
    protected $fillable = [
        'id',
        'user_id',
        'well_being',
        'accident',
        'created_at',

    ]; 
}
