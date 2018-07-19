<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use DB;

class FrameQuestionsController extends Controller
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
    public function index($id)
    {
        $results = AddQuestion::orderBy('id');
        $results->where('quizNumber',$id);
        $questions = $results->paginate(3);
        return view('view-question',['questions' => $questions]);
    }
    public function takeQuiz() {
        $questions = AddQuestion::orderBy('id')->paginate(1);
        return view('take-question',['questions' => $questions]);
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
        

        $noOfQuestion = $request->input('questionNumber');
        $qNumber = $request->input('quizNumber');

        $questionSet = Quiz::find($qNumber);
        $questionSet->questionsAdded = $noOfQuestion;
        $questionSet->save();
        $totalNoOfQuestion = $questionSet->noOfQuestions;

       

       $questionType = $request->input('questionType');

        if($questionType == 'MultipleChoice' || $questionType == 'OrderOptions'){

            $answer=""; 
                
                $answer = "choice".$_POST['radio'];
                   
            
            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'choice1' => $request->input('choice1'),
                'choice2' => $request->input('choice2'),
                'choice3' => $request->input('choice3'),
                'choice4' => $request->input('choice4'),
                'answer' => $request->input($answer),
                'questionType' => $request->input('questionType'),
                'difficultyLevel' => $request->input('difficultyLevel'),

                'quizNumber' => $request->input('quizNumber'),
            ]);

            if($noOfQuestion == $totalNoOfQuestion){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('add.questions', $qNumber);
            }
          
        }else if($questionType == 'TrueFalse'){

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'answer' => $request->input('trueOrFalse'),
                'questionType' => $request->input('questionType'),
                'difficultyLevel' => $request->input('difficultyLevel'),

                'quizNumber' => $request->input('quizNumber'),
            ]);
              
            if($noOfQuestion == $totalNoOfQuestion){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('add.questions', $qNumber);
            }
        }else if($questionType == 'NumericQuestion'){

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'answer' => $request->input('numericQuestion'),
                'questionType' => $request->input('questionType'),
                'difficultyLevel' => $request->input('difficultyLevel'),
                'isRangeAllowed' => $request->input('isRangeAllowed'),

                'quizNumber' => $request->input('quizNumber'),
            ]);
              
            if($noOfQuestion == $totalNoOfQuestion){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('add.questions', $qNumber);
            }
        }else if($questionType == 'FillUp'){

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'answer' => $request->input('fillup'),
                'questionType' => $request->input('questionType'),
                'difficultyLevel' => $request->input('difficultyLevel'),

                'quizNumber' => $request->input('quizNumber'),
            ]);
              
            if($noOfQuestion == $totalNoOfQuestion){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('add.questions', $qNumber);
            }
        }else if($questionType == 'MultipleAnswer'){

            $answer = "";
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
            $choiceCount = 0;
            foreach($_POST['choice'] as $id){
                
                if($choiceCount == 0){
                    $choice1 = $id;
                }else if($choiceCount == 1){
                    $choice2 = $id;
                }else if($choiceCount == 2){
                    $choice3 = $id;
                }else if($choiceCount == 3){
                    $choice4 = $id;
                }
                $choiceCount++;
            }  
            
            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'choice1' => $choice1,
                'choice2' => $choice2,
                'choice3' => $choice3,
                'choice4' => $choice4,
                'answer' => $answer,
                'questionType' => $request->input('questionType'),
                'difficultyLevel' => $request->input('difficultyLevel'),

                'quizNumber' => $request->input('quizNumber'),
            ]);

                return redirect()->route('add.questions', $qNumber);
        }
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

            $question->save();

          }else if($question->questionType == 'MultipleAnswer'){

            $answer = "";
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
            $choiceCount = 0;
            foreach($_POST['choice'] as $id){
                
                if($choiceCount == 0){
                    $choice1 = $id;
                }else if($choiceCount == 1){
                    $choice2 = $id;
                }else if($choiceCount == 2){
                    $choice3 = $id;
                }else if($choiceCount == 3){
                    $choice4 = $id;
                }
                $choiceCount++;
            }

            $question->question = $request->input('question');
            $question->choice1 = $choice1;
            $question->choice2 = $choice2;
            $question->choice3 = $choice3;
            $question->choice4 = $choice4;
            $question->answer = $answer;
            $question->difficultyLevel = $request->input('difficultyLevel');

            $question->save();

          }else if($question->questionType == 'TrueFalse'){
            $question->question = $request->input('question');
            $question->answer = $request->input('trueOrFalse');
            $question->difficultyLevel = $request->input('difficultyLevel');

            $question->save();

          }else if($question->questionType == 'NumericQuestion'){
            $question->question = $request->input('question');
            $question->answer = $request->input('numericQuestion');
            $question->isRangeAllowed = $request->input('isRangeAllowed');
            $question->difficultyLevel = $request->input('difficultyLevel');

            $question->save();

          }else if($question->questionType == 'FillUp'){
            $question->question = $request->input('question');
            $question->answer = $request->input('fillup');
            $question->difficultyLevel = $request->input('difficultyLevel');

            $question->save();
          }

        $url = $request->input('redirects_to');

return redirect()->to($url);

    }
    public function destroy($id)
    {

    }
}
