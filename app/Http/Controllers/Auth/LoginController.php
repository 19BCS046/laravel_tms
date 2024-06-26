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
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
             // Clear the registered email from the session
           session()->forget('registered_email');
            $token = $user->createToken('AppName')->accessToken;
          //  return response()->json($token,200);


            return redirect()->intended('/home')->with('success', 'Login successful!'); // Redirect to desired location after login
        }

        return redirect()->back()->with('error', 'Invalid credentials. Please try again.')->withInput();
    }
    public function detail(){
        $user=Auth::user();
        $response['user']=$user;
        return response()->json($response,200);
    }
}

