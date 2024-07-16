<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cart;
use Illuminate\Http\Request;

class BookedCartsController extends Controller
{
    //search the booked cart

    //booked cart table
    public function bookedCart(){
        $carts=Booking::paginate(6);
        return view('admin.bookedcarts',compact('carts'));
    }
    //view the booked cart
    public function bookedCartDetails($id){
        $cart = Cart::findOrFail($id);
        return view('admin.viewcart', compact('cart'));

    }
    //delete the booked cart
    public function deleteBookedCart($id){
        $booking = Booking::find($id);
        if ($booking->delete()) {
            return redirect()->route('bookedcarts')->with('success', 'BookedCart deleted successfully');
        } else {
            return redirect()->route('bookedcarts')->with('error', 'BookedCart not found');
        }
    }
    public function search(Request $request){
        $query=$request->input('search');
        $carts=Booking::where('title','LIKE',"%{$query}%")
        ->orWhere('location','LIKE',"%{$query}%")
        ->orWhere('username','LIKE',"%{$query}%")
        ->paginate(6);
        return view('admin.bookedcarts',compact('carts','query'));
    }
}
