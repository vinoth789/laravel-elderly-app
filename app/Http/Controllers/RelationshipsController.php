<?php

namespace App\Http\Controllers;

use App\Relationships;
use App\SelfCare;
use Illuminate\Http\Request;
use Auth;
use DB;

class RelationshipsController extends Controller
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
        $family = $request->input('family');
        $friends = $request->input('friends');
        $partnership = $request->input('partnership');
        $nursingStaff = $request->input('nursingStaff');
        $acquaintances = $request->input('acquaintances');
        $eFamily = $request->input('eFamily');
        $eFriends = $request->input('eFriends');
        $ePartnership = $request->input('ePartnership');
        $eNursingStaff = $request->input('eNursingStaff');
        $eAcquaintances = $request->input('eAcquaintances');
        $relationshipResults =((0.5*(0.2*$family+0.2*$friends+0.2*$partnership+0.2*$nursingStaff+0.2*$acquaintances))+(0.5*(0.2*$eFamily+0.2*$eFriends+0.2*$ePartnership+0.2*$eNursingStaff+0.2*$eAcquaintances)));

        $userId =  Auth::user()->id;


        DB::table('relationships')->insert([
            'user_id' => $userId,
            'f_family' => $family,
            'f_friends' => $friends,
            'f_partnership' => $partnership,
            'f_nursing_staff' => $nursingStaff,
            'f_acquaintances' => $acquaintances,
            'e_family' => $family,
            'e_friends' => $friends,
            'e_partnership' => $partnership,
            'e_nursing_staff' => $nursingStaff,
            'e_acquaintances' => $acquaintances,
            'relationships_results' => $relationshipResults,

        ]);



        $entry = SelfCare::get()->first();
            if ($entry === null) {
                DB::table('self_care')->insert([
                    'user_id' => $userId,
                    'r_results' => $relationshipResults,
        
                ]);
            }else{

                $relationshipRes = Relationships::where('user_id',$userId)->orderBy('id', 'DESC')->first();

                     $relationshipID = $relationshipRes->id;

                    
                    if ($relationshipRes === null) {
                        $participation = SelfCare::find(1);
                    }else{
                        $participation = SelfCare::find($relationshipID);
                    }
                    if($participation === null ){
                        DB::table('self_care')->insert([
                            'user_id' => $userId,
                            'r_results' => $relationshipResults,
                
                        ]);
                    }else{
                        $participation->r_results = $relationshipResults;
                        $participation->save();  
                    } 
       
            }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relationships  $relationships
     * @return \Illuminate\Http\Response
     */
    public function show(Relationships $relationships)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relationships  $relationships
     * @return \Illuminate\Http\Response
     */
    public function edit(Relationships $relationships)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relationships  $relationships
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relationships $relationships)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relationships  $relationships
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relationships $relationships)
    {
        //
    }
}
