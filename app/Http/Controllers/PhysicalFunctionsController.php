<?php

namespace App\Http\Controllers;

use App\PhysicalFunctions;
use App\SelfCare;
use Illuminate\Http\Request;
use Auth;
use DB;

class PhysicalFunctionsController extends Controller
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
        $holdingPositions = $request->input('holdingPositions');
        $changingPositions = $request->input('changingPositions');
        $walking = $request->input('walking');
        $climbingStairs = $request->input('climbingStairs');
        $knownPain = $request->input('knownPain');
        $unknownPain = $request->input('unknownPain');
        $fallAsleep = $request->input('fallAsleep');
        $sleepingDuration = $request->input('sleepingDuration');
        $seeing = $request->input('seeing');
        $hearing = $request->input('hearing');
        $physicalResults =((0.25*(0.25*$holdingPositions+0.25*$changingPositions+0.25*$walking+0.25*$climbingStairs))+(0.25*(0.5*$knownPain+0.5*$unknownPain))+(0.25*(0.5*$fallAsleep+0.5*$sleepingDuration))+(0.25*(0.5*$seeing+0.5*$hearing)));
        $userId =  Auth::user()->id;

        DB::table('physical_functions')->insert([
            'user_id' => $userId,
            'holding_positions' => $holdingPositions,
            'changing_positions' => $changingPositions,
            'walking' => $walking,
            'climbing_stairs' => $climbingStairs,
            'known_pain' => $knownPain,
            'unknown_pain' => $unknownPain,
            'fall_asleep' => $fallAsleep,
            'sleeping_duration' => $sleepingDuration,
            'physical_results' => $physicalResults,

        ]);



        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'pf_results' => $physicalResults,
        
                ]);
            }else{
                $physicalFunctionsResults = PhysicalFunctions::where('user_id',$userId)->orderBy('id', 'DESC')->first();
                  $physicalID = $physicalFunctionsResults->id;
                
                if ($physicalFunctionsResults === null) {
                    $participation = SelfCare::find(1);
                }else{
                    $participation = SelfCare::find($physicalID);
                }
                if($participation === null ){
                    DB::table('self_care')->insert([
                        'user_id' => $userId,
                        'pf_results' => $physicalResults,
            
                    ]);
                }else{
                    $participation->pf_results = $physicalResults;
                    $participation->save();  
                }      
            }

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhysicalFunctions  $physicalFunctions
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicalFunctions $physicalFunctions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhysicalFunctions  $physicalFunctions
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicalFunctions $physicalFunctions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhysicalFunctions  $physicalFunctions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysicalFunctions $physicalFunctions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhysicalFunctions  $physicalFunctions
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicalFunctions $physicalFunctions)
    {
        //
    }
}
