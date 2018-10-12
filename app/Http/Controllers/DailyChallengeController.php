<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use App\Answer;
use App\PointsHistory;
use App\User;
use App\DailyChallenge;
use DB;
use Session;
use Auth;
use Carbon;

class DailyChallengeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function store(Request $request)
    {
        
        $questionID = $request->input('questionID');
        $questionType = $request->input('questionType');
        $difficultyLevel = $request->input('difficultyLevel');
        $quizNo = $request->input('quizNo');
        
        
        $userId =  Auth::user()->id;

        if($questionType == 'MultipleChoice' || $questionType == 'OrderOptions' || $questionType == 'TrueFalse' || $questionType == 'ImageAsOptions' || $questionType == 'ImageType' ||$questionType == 'VideoType'){
                $answer=""; 
                if(isset($_POST['radio']))
                $answer = $_POST['radio'];

        }else if($questionType == 'MultipleAnswer'){

            $answer = "";
            if(isset($_POST['selected_ids'])){
            $length = sizeof($_POST['selected_ids']);
            $count = 0;
            foreach($_POST['selected_ids'] as $id){
                if($count == $length-1){
                $answer .= $_POST['choice'][$id];
                }else{
                    $answer .= $_POST['choice'][$id].","; 
                }
                $count++;
            } 
        }
        }else{
            $answer = $request->input('answer');
        }

        $rightAnswer = AddQuestion::find($questionID);
        $correctAnswer = $rightAnswer->answer;
        $is_correct = 'no';
        if($questionType == 'NumericQuestion'){
            $isRangeAllowed = $rightAnswer->isRangeAllowed;
            if($isRangeAllowed  == 'Yes'){
                $min = $correctAnswer-5;
                $max = $correctAnswer+5;
                if(($min <= $answer) && ($answer <= $max)){
                    $is_correct = 'yes';
                }
            }
        }else if(strcasecmp($correctAnswer, $answer) == 0){
            $is_correct = 'yes';
        }else{
            $is_correct = 'no';
        }
            
        if ($is_correct == 'yes') {
                if($difficultyLevel == "Easy"){
                    $points=2; 
                }else if($questionType == "Medium"){
                    $points=4; 
                }else{
                    $points=8; 
                }
        }else{
                $points=0; 
            }
            $mytime = Carbon::now();
            $currentDate = $mytime->toDateString();
         
            DB::table('daily_challenge_results')->insert([
                'user_id' => $userId,
                'question_id' => $questionID,
                'is_correct' => $is_correct,
                'points' => $points,
                'chal_date' => $currentDate,
            ]); 
            $dailyChallengeId = DailyChallenge::where('chal_date',$currentDate)->pluck('id');
            $dailyChallengeTakenUsers = DailyChallenge::find($dailyChallengeId)->first();
             $dailyChallengeTakenUsers->user_id .= ",".$userId;
             $dailyChallengeTakenUsers->save();

            $totalUserPoints = User::find($userId);

              $totalUserPoints->daily_challenge_points += $points;
              $totalUserPoints->total_points = $totalUserPoints->daily_challenge_points+$totalUserPoints->points_earned;
              $totalUserPoints->save();

                return redirect()->route('home'); 
           
                
       }

}
