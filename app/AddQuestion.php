<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AddQuestion extends Model
{
    
    protected $table = 'questions';
    protected $fillable = [
        'id',
        'question',
        'choice1',
        'choice2',
        'choice3',
        'choice4',
        'imgFileName',
        'answer', 
        'isRangeAllowed',
        'questionType',
        'difficultyLevel',
        'quizNumber',
    ]; 
    
}
