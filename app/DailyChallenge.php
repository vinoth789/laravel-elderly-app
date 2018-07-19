<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DailyChallenge extends Model
{
    
    protected $table = 'daily_challenge';
    protected $fillable = [
        'questionId',
        'user_id',
        'status',
        'chal_date',
    ]; 

    // public function quiz()
    // {
    //     return $this->belongsTo('App\Quiz');
    // }
    
}
