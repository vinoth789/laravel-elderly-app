<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    
    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required'
        ]);

        //Attempt login
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->remember))
        {
            //successfull login
            return redirect()->intended(route('admin.dashboard'));
        }
            //login failure
            return redirect()->back()->withInput($request->only('email','remember'));
    }
}
