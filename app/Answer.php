<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    
    protected $table = 'quiz_results';
    protected $fillable = [
        'user_id',
        'quiz_number',
        'question_number',
        'answer',
        'is_correct',
        'points',
    ]; 
    
}
