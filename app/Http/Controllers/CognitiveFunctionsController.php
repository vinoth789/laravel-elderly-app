<?php

namespace App\Http\Controllers;

use App\CognitiveFunctions;
use App\SelfCare;
use Illuminate\Http\Request;
use Auth;
use DB;

class CognitiveFunctionsController extends Controller
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
        $expression = $request->input('expression');
        $understanding = $request->input('understanding');
        $concentration = $request->input('concentration');
        $memory = $request->input('memory');
        $orientation = $request->input('orientation');
        $userId =  Auth::user()->id;
        $cognitiveResults =((0.5*(0.5*$expression+0.5*$understanding))+(0.5*(0.33*$concentration+0.33*$memory+0.33*$orientation)));


        DB::table('cognitive_functions')->insert([
            'user_id' => $userId,
            'expresiion' => $expression,
            'understanding' => $understanding,
            'concentration' => $concentration,
            'memory' => $memory,
            'orientation' => $orientation,
            'cognitive_results' => $cognitiveResults,

        ]);

        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'cf_results' => $cognitiveResults,
        
                ]);
            }else{
                $cognitiveFunctionsResults = CognitiveFunctions::where('user_id',$userId)->orderBy('id', 'DESC')->first();
                     $cognitiveID = $cognitiveFunctionsResults->id;

                    if ($cognitiveFunctionsResults === null) {
                        $participation = SelfCare::find(1);
                    }else{
                        $participation = SelfCare::find($cognitiveID);
                    }
                    if($participation === null ){
                        DB::table('self_care')->insert([
                            'user_id' => $userId,
                            'cf_results' => $cognitiveResults,
                
                        ]);
                    }else{
                        $participation->cf_results = $cognitiveResults;
                        $participation->save();  
                    } 
     
            }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CognitiveFunctions  $cognitiveFunctions
     * @return \Illuminate\Http\Response
     */
    public function show(CognitiveFunctions $cognitiveFunctions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CognitiveFunctions  $cognitiveFunctions
     * @return \Illuminate\Http\Response
     */
    public function edit(CognitiveFunctions $cognitiveFunctions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CognitiveFunctions  $cognitiveFunctions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CognitiveFunctions $cognitiveFunctions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CognitiveFunctions  $cognitiveFunctions
     * @return \Illuminate\Http\Response
     */
    public function destroy(CognitiveFunctions $cognitiveFunctions)
    {
        //
    }
}
