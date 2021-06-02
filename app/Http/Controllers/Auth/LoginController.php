<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Auth;

class LoginController extends Controller
{
    public function home()
    {
        return view('home');
    }


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
            if(Auth::user()->email_verified_at == null){
                Auth::logout();
                return redirect('login')->with('error', 'Please verify your email');
            }
            return redirect('/');
        }

        return redirect()
                ->back()
                ->with('error', 'Oops! Invalid credentials')
                ->withInput();
    }

   
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}


