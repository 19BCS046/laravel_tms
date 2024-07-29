<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lastname' => $request->lastname,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
         $token = $user->createToken('AppName')->accessToken;
        // return response()->json(['token' => $token], 201);
        Mail::send('email.register', [], function($message) use($request) {
            $message->to($request->input('email'));
            $message->subject('Registered Successfully in PeruZ Tours');
        });

         return redirect()->back()->with('success', 'Registration successful!');
    }
}
