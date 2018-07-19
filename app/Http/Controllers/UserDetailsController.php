<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\AddQuestion;
use App\Quiz;
use App\Answer;
use App\PointsHistory;
use App\User;
use App\DailyChallenge;
use DB;
use Session;
use Auth;
use Carbon;

class UserDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        
    }

    public function store(Request $request) {

        $userId = $request->input('user_id');
        $userDetails = User::where('id',$userId)->first();
        if( $request->ajax() ) {
                    return response()->json([
                        'userDetails' => $userDetails
                    ]);
                }
    }
}
