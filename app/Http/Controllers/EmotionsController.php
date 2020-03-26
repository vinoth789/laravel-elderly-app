<?php

namespace App\Http\Controllers;

use App\Emotions;
use App\SelfCare;
use Illuminate\Http\Request;
use Auth;
use DB;

class EmotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $motivation = $request->input('motivation');
        $highMood = $request->input('highMood');
        $relaxation = $request->input('relaxation');
        $indifference = $request->input('indifference');
        $sadnesss = $request->input('sadnesss');
        $frustration = $request->input('frustration');

        if($motivation <= 0.33){
            $motivation =0;
        }else{
            $motivation =1;
        } 
        if($highMood <= 0.33){
            $highMood =0;
        }else{
            $highMood =1;
        } 
        if($relaxation <= 0.33){
            $relaxation =0;
        }else{
            $relaxation =1;
        } 
        if($indifference <= 0.33){
            $indifference =0;
        }else{
            $indifference =1;
        } 
        if($sadnesss <= 0.33){
            $sadnesss =0;
        }else{
            $sadnesss =1;
        }
        if($frustration <= 0.33){
            $frustration =0;
        }else{
            $frustration =1;
        } 
        

        $positiveEffects =  $motivation + $highMood + $relaxation;
        $negativeEffects =  $indifference + $sadnesss + $frustration;

        if($positiveEffects == $negativeEffects){

            $emotionResults = 1;          
        
        }else 
        if($positiveEffects > $negativeEffects){

            $emotionResults = $negativeEffects/ $positiveEffects;          
        }else{
            $emotionResults = $positiveEffects/ $negativeEffects;
        }
        //$emotionResults =((0.5*(0.2*$family+0.2*$friends+0.2*$partnership+0.2*$nursingStaff+0.2*$acquaintances))+(0.5*(0.33*$eFamily+0.33*$eFriends+0.33*$ePartnership+0.33*$eNursingStaff+0.33*$eAcquaintances)));

        $userId =  Auth::user()->id;


        DB::table('emotions')->insert([
            'user_id' => $userId,
            'motivation' => $motivation,
            'high_mood' => $highMood,
            'relaxation' => $relaxation,
            'indifference' => $indifference,
            'sadness' => $sadnesss,
            'frustration' => $frustration,
            'emotions_results' => $emotionResults,

        ]);



        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'e_results' => $emotionResults,
        
                ]);
            }else{

                $emotionsRes = Emotions::where('user_id',$userId)->orderBy('id', 'DESC')->first();

                   $emotionID = $emotionsRes->id;
                    
                    if ($emotionsRes === null) {
                        $participation = SelfCare::find(1);
                    }else{
                        $participation = SelfCare::find($emotionID);
                    }
                    if($participation === null ){
                        DB::table('self_care')->insert([
                            'user_id' => $userId,
                            'e_results' => $emotionResults,
                
                        ]);
                    }else{
                        $participation->e_results = $emotionResults;
                        $participation->save();  
                    } 
      
            }

       // return redirect()->route('home');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emotions  $emotions
     * @return \Illuminate\Http\Response
     */
    public function show(Emotions $emotions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emotions  $emotions
     * @return \Illuminate\Http\Response
     */
    public function edit(Emotions $emotions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emotions  $emotions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emotions $emotions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emotions  $emotions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emotions $emotions)
    {
        //
    }
}
