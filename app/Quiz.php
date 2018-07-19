<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    
    // public function addQuestion()
    // {
    //     return $this->hasMany('App\AddQuestion');
    // }

    protected $table = 'quiz_details';
    protected $fillable = [
        'id',
        'quizNumber',
        'quizName',
        'questionsAdded',
        'teacherQuizStatus',
        'timerStatus',
        
    ]; 

    // public function pointsHistory()
    // {
    //     return $this->hasMany('App\PointsHistory', 'quiz_number');
    // }

    
}
