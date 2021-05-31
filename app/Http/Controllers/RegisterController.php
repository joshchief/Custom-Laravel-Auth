<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;
use Mail;

use App\Models\User;
use App\Models\VerifyUser;

class RegisterController extends Controller
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
    public function createUser()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|between:6,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        

        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => hash::make($request->password)
       ]);

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id
        ]);
        
        Mail::to($user->email)->send(new VerifyEmail($user)); 
        
        return redirect('login')->with('success', 'Registration successful!');

        
    }

    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();

        if(isset($verifiedUser))
        {
            $user = $verifiedUser->user;
            if(!$user->email_verified_at)
            {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect('/login')->with('success', 'E-mail verification successful!');
            } else {
                return redirect()
                        ->back()
                        ->with('info', 'E-mail has already been verified');
            }
        } else {
            return redirect('/login')
                ->with('error', 'something went wrong');
        }
    }
}
