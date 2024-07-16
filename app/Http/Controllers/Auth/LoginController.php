<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('AppName')->accessToken;
          //  return response()->json($token,200);
          if ($user->isAdmin()) {
            return redirect()->intended('/admin')->with('success', 'Login successful as Admin!');
        }
            return redirect()->intended('/home')->with('success', 'Login successful!'); // Redirect to desired location after login
        }

        return redirect()->back()->with('error', 'Invalid credentials. Please try again.')->withInput();
    }
    public function detail(){
        $user=Auth::user();
        $response['user']=$user;
        return response()->json($response,200);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
        // return redirect()->route('mycart')->with('success','Booking Successful!');

    }
    public function userDashboard(){
        return view('/home');
    }
}

