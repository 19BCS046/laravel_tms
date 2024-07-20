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
            'email'=>'required|email|exists:users,email'
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
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $password_reset_request = DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->where('token', $request->token)
            ->first();
        if (!$password_reset_request) {
            return back()->with('error', 'Invalid token');
        }
        User::where('email', $request->input('email'))
            ->update([
                'password' => Hash::make($request->input('password'))
            ]);
        DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->delete();
        return redirect('/login')->with('message', 'Your password has been changed');
    }

}
