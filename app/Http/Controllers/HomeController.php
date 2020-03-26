<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\SelfCare;

use App\User;

use DB;
use Session;
use Auth;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId =  Auth::user()->id;
        $userDetails = User::where('id',$userId)->get();
        $participation = SelfCare::where('user_id',$userId)->get();

        return view('home',['user' => $userDetails, 'participation' => $participation]);
    }

}