<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use DB;
use File;
use Video;

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

    public function videoStore(Request $request){
        if($request->hasFile('file')) {
        $video = $request->file('file');

        $videoName = $video->getClientOriginalName();
            $video->move(public_path('video'),$videoName);
            try{
            return response()->json([
                'success' => true,
                'videoName' => $videoName
            ]);
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        }

    }
    
    public function fileStore(Request $request)
    {

        if($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'),$imageName);
            try{
                return response()->json([
                    'success' => true,
                    'imageName' => $imageName
                ]);
            }catch(\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }
        }
            
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        //$filename =  $request->get('id');
        // AddQuestion::where('imgFileName',$filename)->delete();
        $path=public_path().'/img/'.$filename;
        if (file_exists($path)) {
            unlink($path);
            //$filename->delete();
        }
        return $filename;  
    }

    public function videoDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        //$filename =  $request->get('id');
        // AddQuestion::where('imgFileName',$filename)->delete();
        $path=public_path().'/video/'.$filename;
        if (file_exists($path)) {
            unlink($path);
            //$filename->delete();
        }
        return $filename;  
    }
 
    public function imageFromServer(Request $request)
    {
        //echo "hello";
        $filenames =[];
        $filenames =  $request->input();
        //$filenames =[];
        //$filenames = Input::all();

        $imageNameWithSize = [];

        foreach ($filenames as $key=>$value) {
            foreach($value as $select){

            $path=public_path().'/img/'.$select;
            $imageNameWithSize[] = [
                'imageName' => $select ,
                'size' => File::size($path)
            ];
        }
            
        }

        return response()->json([
            'imageNameWithSize' => $imageNameWithSize
        ]);
        //return $imageNameWithSize;
    }

    public function videoFromServer(Request $request)
    {
        //$filenames =[];
        $filename =  $request->get('filename');
        // $filenames =  $request->input();
        // $filename = serialize($filenames);
        //$filename.trim();

            $path=public_path().'/video/'.$filename;

                return response()->json([
                    'videoName' => $filename,
                    'size' => File::size($path)
                ]);

    }

    public function singleImageFromServer(Request $request)
    {
        //$filenames =[];
        $filename =  $request->get('filename');
        // $filenames =  $request->input();
        // $filename = serialize($filenames);
        //$filename.trim();

            $path=public_path().'/img/'.$filename;

                return response()->json([
                    'imageName' => $filename,
                    'size' => File::size($path)
                ]);

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
                if($questionType == 'OrderOptions'){
                    $question = $request->input('orderOptionsQuestion');
                } else {
                    $question = $request->input('question');
                }
                   
            
            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $question,
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
        }else if($questionType == 'ImageAsOptions'){

            $answer=""; 
                
                //$radioValue = $_POST['radio'];
                $answer = "uploadImage".$_POST['imageRadio'];
                $image1 = $_POST['uploadImage0'];
                $image2 = $_POST['uploadImage1'];
                $image3 = $_POST['uploadImage2'];
                $image4 = $_POST['uploadImage3'];

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'choice1' => $image1,
                'choice2' => $image2,
                'choice3' => $image3,
                'choice4' => $image4,
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
        }else if($questionType == 'ImageType'){

            $answer=""; 
                
                //$radioValue = $_POST['radio'];
                $answer = "uploadSingleImage".$_POST['singleImageRadio'];
                $imageName = $_POST['uploadSingleImage'];
                $image1 = $_POST['uploadSingleImage0'];
                $image2 = $_POST['uploadSingleImage1'];
                $image3 = $_POST['uploadSingleImage2'];
                $image4 = $_POST['uploadSingleImage3'];

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'choice1' => $image1,
                'choice2' => $image2,
                'choice3' => $image3,
                'choice4' => $image4,
                'imgFileName' => $imageName,
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
        } else if($questionType == 'VideoType'){

            $answer=""; 
                
                //$radioValue = $_POST['radio'];
                $answer = "uploadVideo".$_POST['videoRadio'];
                $videoName = $_POST['uploadVideo'];
                $choice1 = $_POST['uploadVideo0'];
                $choice2 = $_POST['uploadVideo1'];
                $choice3 = $_POST['uploadVideo2'];
                $choice4 = $_POST['uploadVideo3'];

            DB::table('questions')->insert([
                'questionNumber' => $request->input('questionNumber'),
                'question' => $request->input('question'),
                'choice1' => $choice1,
                'choice2' => $choice2,
                'choice3' => $choice3,
                'choice4' => $choice4,
                'imgFileName' => $videoName,
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
        } else if($questionType == 'MultipleAnswer'){

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
          if($question->questionType == 'MultipleChoice' || $question->questionType == 'OrderOptions' || $question->questionType == 'ImageType' || $question->questionType == 'ImageAsOptions' || $question->questionType == 'VideoType'){

                    $answer=""; 
                    $radioValue = $_POST["radio"];
                    $answer = "choice".$_POST['radio'];
                    

            $question->question = $request->input('question');
            $question->choice1 = $request->input('choice1');
            $question->choice2 = $request->input('choice2');
            $question->choice3 = $request->input('choice3');
            $question->choice4 = $request->input('choice4');
            if($question->questionType == 'ImageType'){
                $question->imgFileName = $request->input('uploadSingleImage');
            }else if($question->questionType == 'VideoType'){
                $question->imgFileName = $request->input('uploadVideo');
            }
 
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