<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PointsHistory extends Model
{
    
    protected $table = 'points_history';
    protected $fillable = [
        'user_id',
        'quiz_number',
        'quiz_name',
        'totalQuestions',
        'correctAnswers',
        'wrongAnswers',
        'pointsEarned',
        'quizStatus',
    ]; 

    // public function quiz()
    // {
    //     return $this->belongsTo('App\Quiz');
    // }
    
}
