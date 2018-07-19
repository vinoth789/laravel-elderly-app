<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use App\PointsHistory;
use\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizs = Quiz::all();

        $studentResults = DB::table('points_history')
    ->join('users', 'users.id', '=', 'points_history.user_id')
    ->join('quiz_details', 'quiz_details.quizNumber', '=', 'points_history.quiz_number')
    ->get();

    $questions = AddQuestion::get()->whereNotIn('isNew',"No");

        return view('admin-home',['quizs' => $quizs, 'questions' => $questions, 'studentResults' => $studentResults]);
    }


    public function showAddQuizForm($id)
    {
        $quiz = Quiz::find($id);
        $questions = AddQuestion::get()->where('quizNumber',$id);
        return view('add-question',compact('questions','quiz'));
    }

    public function showCreateQuizForm()
    {
        $quizs = Quiz::all();
        return view('create-quiz',['quizs' => $quizs]);
    }

    public function updateTimer(Request $request, $id)
    {
        $status = $request->input('timerSwitchStatus');
        $quiz = Quiz::find($id);
            $quiz->timerStatus = $status;
            $quiz->save();
            return redirect()->route('admin.dashboard');

    }

    public function update(Request $request, $id)
    {
    
            $quiz = Quiz::find($id);
            $quiz->teacherQuizStatus = $request->input('teacherQuizStatus');
            $quiz->save();
            return redirect()->route('admin.dashboard');
          
    }

    public function searchStudentResults(){
        $searchKeyword = Input::get('searchKeyword');

        $studentResults = DB::table('points_history')
    ->join('users', 'users.id', '=', 'points_history.user_id')
    ->join('quiz_details', 'quiz_details.quizNumber', '=', 'points_history.quiz_number')
    ->where('users.name', 'LIKE', $searchKeyword)
    ->orWhere('quiz_details.quizName', 'LIKE', $searchKeyword)
    ->get();
    
    $quizs = Quiz::all();
    return view('admin-home',['quizs' => $quizs, 'studentResults' => $studentResults]);
}
    
}
