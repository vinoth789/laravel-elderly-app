<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DailyChallengeResults extends Model
{
    
    protected $table = 'daily_challenge_results';
    protected $fillable = [
        'user_id',
        'question_id',
        'is_correct',
        'status',
        'points',
        'chal_date',
    ]; 

    // public function quiz()
    // {
    //     return $this->belongsTo('App\Quiz');
    // }
    
}
