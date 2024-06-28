<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm(){
        return view('auth.forgotPassword');
    }
    public function submitForgotPasswordForm(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);
        $token=Str::random(64);
        DB::table('password_reset_tokens')
        ->insert([
            'email'=>$request->input('email'),
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        Mail::send('email.forgotPassword',['token'=>$token],function($message) use($request){
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });
        return back()->with('message','We have emailed to you reset password link');
    }
    public function showResetPasswordForm($token){
        return view('auth.forgotPasswordLink',['token'=>$token]);
    }
    public function submitResetPasswordForm(Request $request) {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Retrieve the password reset request
        $password_reset_request = DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->where('token', $request->token)
            ->first();

        // Check if the password reset request exists and is valid
        if (!$password_reset_request) {
            return back()->with('error', 'Invalid token');
        }

        // Update the user's password
        User::where('email', $request->input('email'))
            ->update([
                'password' => Hash::make($request->input('password'))
            ]);

        // Delete the password reset token
        DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->delete();

        // Redirect to the login page with a success message
        return redirect('/login')->with('message', 'Your password has been changed');
    }

}
