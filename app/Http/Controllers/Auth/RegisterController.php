<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator['phone']='';
        $validator['city']='';
        $validator['address']='';
        $validator['lastname']='';

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password'=>'required|same:password',
            'lastname'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
            'phone'=>'required|string|max:10'
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
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
