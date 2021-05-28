<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Auth;

class LoginController extends Controller
{
    
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('/');
        }

        return redirect('login')->with('error', 'Oops! Invalid credentials');
    }

   
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
