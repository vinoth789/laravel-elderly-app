<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

class HomeController extends Controller
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
        $userId =  Auth::user()->id;
        $quizResults = PointsHistory::where('user_id',$userId)->where('studentQuizStatus','Finish')->get();
        $quizCompleted = PointsHistory::where('user_id',$userId)->where('studentQuizStatus','Finish')->pluck('quiz_number');
        $finishedQuiz = $quizCompleted;

        $quizs = Quiz::where('teacherQuizStatus','Finish')->whereNotIn('quizNumber',$quizCompleted)->get();
        $retakeQuizs = Quiz::where('teacherQuizStatus','Finish')->whereIn('quizNumber',$finishedQuiz)->get();
        $userPoints = User::orderByRaw('total_points DESC')->get();
        $mytime = Carbon::now();

        $currentTime = $mytime->toDateString();
        $dailyChallengeQuestion = DailyChallenge::where('created_at',$currentTime)->first();
        $userTakenChallenge = false;
        $question = null;
        $questionID = null;
        if ($dailyChallengeQuestion) {
        $questionID = $dailyChallengeQuestion->questionId;
        
        if(Str::contains($dailyChallengeQuestion->user_id, $userId)) {
            $userTakenChallenge = true;
        }
    }
    $question = AddQuestion::where('id',$questionID) ->first();
        return view('home',['quizs' => $quizs, 'userTakenChallenge' => $userTakenChallenge, 'retakeQuizs' => $retakeQuizs, 'quizResults' => $quizResults, 'question' => $question, 'userPoints' => $userPoints]);
    }

}
