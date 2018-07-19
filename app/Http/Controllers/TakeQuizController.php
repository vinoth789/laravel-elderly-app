<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use App\User;
use App\Answer;
use App\PointsHistory;
use DB;
use Auth;

class TakeQuizController extends Controller
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
    public function index($view)
    {
        $results = AddQuestion::orderBy('id');
        $results->where('quizNumber',1);
        $questions = $results->paginate(1);
        return view('take-quiz',['questions' => $questions]);
    }

    public function displayQuestions($quizNo,$attempt,$questionNo = null){

        $allQuestions = AddQuestion::where('quizNumber',$quizNo)->get();
        if($questionNo == null){
            $questionNo = 0;
            if($allQuestions->isNotEmpty()) { 
                $question = $allQuestions[$questionNo];
                }
            if(count($allQuestions) == 1) { 
                $questionNo = -1;
                }
        }
        $quiz = Quiz::find($quizNo);

        return view('take-quiz',compact('question','quiz', 'questionNo','attempt'));
    }

    public function storeAnswers(Request $request){
    
        $qNumber = $request->input('answer');
        
        $userId =  Auth::user()->id;
        
        $allQuestions = AddQuestion::where('quizNumber',$quizNo)->get();
        $count = count($allQuestions);

        if($questionNo == null){
            $questionNo = 0;
        if($allQuestions->isNotEmpty()) { 
            $question = $allQuestions[$questionNo];

            }
        }elseif($questionNo < $count){
            $questionNo++;
            if($allQuestions->isNotEmpty()) {
                $question = $allQuestions[$questionNo];

            }
        }

        $quiz = Quiz::find($quizNo);
        return view('take-quiz',compact('question','quiz', 'questionNo'));
    }
   
    public function create()
    {
        //
    }
    public function show($id)
    {
        return AddQuestion::find($id);
    }
    public function edit($id)
    {
        $question = AddQuestion::find($id);
        return view('edit-question')->with('question', $question);
    }
    
    
    public function store(Request $request)
    {
        $questionNo = $request->input('questionNo');
        $questionID = $request->input('questionID');
        $questionType = $request->input('questionType');
        $difficultyLevel = $request->input('difficultyLevel');
        $quizNo = $request->input('quizNo');
        $attempt = $request->input('attempt');
        
        
        $userId =  Auth::user()->id;

        if($questionType == 'MultipleChoice' || $questionType == 'MultipleChoice'){
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
        }else if($questionType == 'TrueFalse'){
                $answer=""; 
                if(isset($_POST['radio']))
                $answer = $_POST['radio'];
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
            
        
        $allQuestions = AddQuestion::where('quizNumber',$quizNo)->get();
        $count = count($allQuestions);
        $quiz = Quiz::find($quizNo);
        $quizName = $quiz->quizName; 
        
        if($questionNo == -1){
            if($attempt == "firstAttempt"){  
            DB::table('quiz_results')->insert([
                'user_id' => $userId,
                'question_number' => $questionID,
                'quiz_number' => $quizNo,
                'answer' => $answer,
                'is_correct' => $is_correct,
                'points' => $points,
            ]); 
            $wrongAnswers = Answer::where('user_id',$userId)->where('quiz_number',$quizNo)->where('is_correct','no')->count();
            $totalAnswers = Answer::where('user_id',$userId)->where('quiz_number',$quizNo)->get();
            
            $totalPoints = 0;
            $totalQuestions =0;
            foreach($totalAnswers as $answer){
                $totalPoints += $answer->points;
                $totalQuestions++;
                }
                $rightAnswers = $totalQuestions - $wrongAnswers;

            DB::table('points_history')->insert([
                'user_id' => $userId,
                'quiz_number' => $quizNo,
                'quiz_name'=>$quizName,
                'totalQuestions' => $totalQuestions,
                'correctAnswers' => $rightAnswers,
                'wrongAnswers' => $wrongAnswers,
                'pointsEarned' => $totalPoints,
                'studentQuizStatus' => "Finish",
            ]); 

            $userPoints = PointsHistory::get()->where('user_id',$userId);
            $points =0;
            foreach($userPoints as $userPoint){
                $points += $userPoint->pointsEarned;
                }
            $totalUserPoints = User::find($userId);

              $totalUserPoints->points_earned = $points;
              $totalUserPoints->total_points = $points+$totalUserPoints->daily_challenge_points;
              $totalUserPoints->save();

            return redirect()->route('summary.show', $quizNo);
            }else {
                return redirect()->route('home'); 
            }
                
       }else{
        if($questionNo != $count-2){
            $questionNo++;
            if($allQuestions->isNotEmpty()) {
                $question = $allQuestions[$questionNo];

            }
        }else{
            $questionNo++;
            $question = $allQuestions[$questionNo];
            $questionNo = -1;
        }
        if($attempt == "firstAttempt"){
        DB::table('quiz_results')->insert([
            'user_id' => $userId,
            'question_number' => $questionID,
            'quiz_number' => $quizNo,
            'answer' => $answer,
            'is_correct' => $is_correct,
            'points' => $points,
        ]);
        }
        
        return view('take-quiz',compact('question','quiz', 'questionNo','attempt'));
       }
        
    }

    public function showQuizSummary($quizNo)
    {
        $userId =  Auth::user()->id;
        $pointsHistory = PointsHistory::get()->where('user_id',$userId)->where('quiz_number',$quizNo);

        return view('quiz-summary',['pointsHistory' => $pointsHistory]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'answer' => 'required',
          ]);
    
          $question = AddQuestion::find($id);
        
            $question->update($request->all());
             
        session()->flash('message', 'Updated successfully');
        return redirect()->route('view.questions');
    }
    public function destroy($id)
    {
        //
    }
}