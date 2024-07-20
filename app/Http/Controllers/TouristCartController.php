<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TouristCartController extends Controller
{
    // public function cart(){
    //     return view('includes.home');
    // }
    public function touristCart()
    {
        $touristCart = Cart::paginate(6);
        return view('cart', compact('touristCart'));
    }
    public function cartDetails($id){
            $cart = Cart::findOrFail($id);
            return view('cartdetails', compact('cart'));
    }
    public function search(Request $request){
        $query=$request->input('search');
        $result=Cart::where('title','LIKE',"%{$query}%")
        ->orWhere('location','LIKE',"%{$query}%")
        ->get();
        return view('search',compact('result','query'));

    }
    public function topTouristPlace(){
        $places= Cart::where('rating', '>', 4.0)
        ->orderBy('rating', 'desc')
        ->take(10)
        ->get();
        return view('topplace',compact('places'));

    }
    public function book($id){

        $cart=Cart::find($id);
        $users = Auth::user();
        if($cart){
            Booking::create([
                'cart_id'=>$cart->id,
                'user_id'=>auth()->id(),
                'status'=>'booked',
                'title'=>$cart->title,
                'location'=>$cart->location,
                'username'=>$users->name,
                'cost'=>$cart->cost,
            ]);
            $user=User::find(auth()->id());
            Mail::send('email.cartbook', [], function($message) use($user)  {
                $message->to($user->email);
                $message->subject('Successfully Booked Your Tourist Plan');
            });
            return redirect()->route('mycart')->with('success','Booking Successful!');
        }
        return redirect()->route('cartdetails')->with('error','Booking failed.Cart not found');
    }
    public function mycart(){
        $bookings=Booking::where('user_id',auth()->id())->get();
        return view('mycart',compact('bookings'));
    }
}

