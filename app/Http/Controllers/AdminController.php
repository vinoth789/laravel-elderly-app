<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddQuestion;
use App\Quiz;
use App\User;
use App\PointsHistory;
use\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
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
    public function index()
    {
       $userDetails = User::get();
       return view('admin-home',['user' => $userDetails]);

    }
    
}
