<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

       $user_admin = User::where('email', $email)->first();

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('AppName')->accessToken;

            if ($user_admin->admin == 1) {
                return redirect()->intended('/admin')->with('success', 'Login successful as Admin!');
            } elseif ($user_admin->admin == 0) {
                return redirect()->intended('/home')->with('success', 'Login successful!');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials. Please try again.')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('includes.log_home');
    }

    public function userDashboard()
    {
        return view('/home');
    }

    public function unauthorization()
    {
        return view('includes.unauthorization');
    }
}
