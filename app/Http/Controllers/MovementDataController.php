<?php

namespace App\Http\Controllers;

use App\MovementData;
use Illuminate\Http\Request;
use Auth;
use DB;

class MovementDataController extends Controller
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
        $currentDate = $request->input('currentDate');
        $wellBeing = $request->input('wellBeing');
        $happening = $request->input('happening');
        $userId =  Auth::user()->id;
        //$cognitiveResults =((0.5*(0.5*$expression+0.5*$understanding))+(0.5*(0.33*$concentration+0.33*$memory+0.33*$orientation)));


        DB::table('movement_data')->insert([
            'user_id' => $userId,
            'well_being' => $wellBeing,
            'accident' => $happening,
        ]);

        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'accident' => $happening,
        
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
     * @param  \App\MovementData  $movementData
     * @return \Illuminate\Http\Response
     */
    public function show(MovementData $movementData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovementData  $movementData
     * @return \Illuminate\Http\Response
     */
    public function edit(MovementData $movementData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovementData  $movementData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovementData $movementData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovementData  $movementData
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovementData $movementData)
    {
        //
    }
}
