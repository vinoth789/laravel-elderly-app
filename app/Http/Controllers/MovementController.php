<?php

namespace App\Http\Controllers;

use App\Movement;
use Illuminate\Http\Request;
use App\SelfCare;
use Auth;
use DB;
use Carbon;

class MovementController extends Controller
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
        $mytime = Carbon::now();
        echo $mytime->toDateTimeString();

        DB::table('movements')->insert([
            'user_id' => $userId,
            'well_being' => $wellBeing,
            'accident' => $happening,
            'created_at' => $mytime,
        ]);

        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'accident' => $happening,
        
                ]);
            }else{
                $movementDataResults = Movement::where('user_id',$userId)->orderBy('id', 'DESC')->first();
                     $movementID = $movementDataResults->id;

                    if ($movementDataResults === null) {
                        $participation = SelfCare::find(1);
                    }else{
                        $participation = SelfCare::find($movementID);
                    }
                    if($participation === null ){
                        DB::table('self_care')->insert([
                            'user_id' => $userId,
                            'accident' => $happening,
                
                        ]);
                    }else{
                        $participation->accident = $happening;
                        $participation->save();  
                    } 
     
            }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movement  $movement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
