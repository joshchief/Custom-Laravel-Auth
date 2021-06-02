<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Mail;
use Hash;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitForgetPasswordForm(Request $request)
    {
        // check & validate email
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // assign token
        $token = Str::random(64);

        // insert into DB table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Mail::send('email view', [array of data to the view], closure callback to customize recipient, subject etc)
        Mail::send('email.forgotPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

         
        return back()
                ->with('info', 'We have emailed your password reset link');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitResetPasswordForm(Request $request)
    {
        // check & validate input forms
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|between:6,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        // check DB
        $updatePassword = DB::table('password_resets')
                                ->where([
                                    'email' => $request->email,
                                    'token' => $request->token,
                                ])
                                ->first();
                                  
        if(!$updatePassword)
        {
            return back()
                    ->withInput()
                    ->with('error', 'Invalid token!');
        }

        // Update User Model
        $user = User::where('email', $request->email)
                        ->update([
                            'password' => Hash::make($request->password)
                        ]);
        
        //  Delete 
        DB::table('password_resets')->where([
            'email' => $request->email
        ])->delete();

        return redirect('/login')->with('success', 'Your Password has been changed');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }//
}
