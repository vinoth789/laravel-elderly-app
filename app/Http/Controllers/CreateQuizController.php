<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use DB;

class CreateQuizController extends Controller
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
    
        return view('create-quiz',['questions' => $questions]);
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
        $this->validate($request, [
            'id' => 'required',
            'quizNumber' => 'required',
            'quizName' => 'required',
          ]);
          $quizType = $request->input('quizType');
          $quizNumber = $request->input('quizNumber');
          if($quizType == 'questionPool'){
            $this->validate($request, [
                'selected_questions' => 'required',
              ]);  
        }

        
        if($quizType == 'questionPool'){
            
            if(isset($_POST['selected_questions'])){
                $count = 1;
            foreach($_POST['selected_questions'] as $id){
                
                $questions = AddQuestion::find($id);

                $questionNumber = $count;
                $question = $questions->question;
                $choice1 = $questions->choice1;
                $choice2 = $questions->choice2;
                $choice3 = $questions->choice3;
                $choice4 = $questions->choice4;
                $answer = $questions->answer;
                $imgVidFileName = $questions->imgFileName;
                $questionType = $questions->questionType;
                $difficultyLevel = $questions->difficultyLevel;
                

                DB::table('questions')->insert([
                    'questionNumber' => $questionNumber,
                    'question' => $question,
                    'choice1' => $choice1,
                    'choice2' => $choice2,
                    'choice3' => $choice3,
                    'choice4' => $choice4,
                    'answer' => $answer,
                    'imgFileName' => $imgVidFileName,
                    'questionType' => $questionType,
                    'difficultyLevel' => $difficultyLevel,    
                    'quizNumber' => $quizNumber,
                    'isNew' => "No",
                ]);
                $count++;
            } 
        }
        }

        Quiz::create($request->all());
        $noOfQuestions = AddQuestion::where('quizNumber',$quizNumber)->count();
        $questionSet = Quiz::find($quizNumber);
        $questionSet->questionsAdded = $noOfQuestions;
        $questionSet->save();
          
          return redirect()->route('admin.dashboard');

    }

    public function update(Request $request, $id)
    {
        
    
          $question = AddQuestion::find($id);
          if($question->questionType == 'MultipleChoice'){

                    $answer=""; 
                    $radioValue = $_POST["radio"];
                    $answer = "choice".$_POST['radio'];
                    

            $question->question = $request->input('question');
            $question->choice1 = $request->input('choice1');
            $question->choice2 = $request->input('choice2');
            $question->choice3 = $request->input('choice3');
            $question->choice4 = $request->input('choice4');
            $question->answer = $request->input($answer);
            $question->difficultyLevel = $request->input('difficultyLevel');
            $question->points = $request->input('points');
            $question->quizNumber = $request->input('quizNumber');
            $question->save();

          }
        session()->flash('message', 'Updated successfully');
        return redirect()->route('view.quiz');
    }
    public function destroy($id)
    {
        
    }
}
