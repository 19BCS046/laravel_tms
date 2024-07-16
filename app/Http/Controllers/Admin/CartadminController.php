<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartadminController extends Controller
{
    //tourist carts
    public function cartadmin(){
        $carts=Cart::paginate(6);
        return view('admin.cartadmin',compact('carts'));
    }
    //search the carts
    public function search(Request $request){
        $query=$request->input('search');
        $carts=Cart::where('title','LIKE',"%{$query}%")
        ->orWhere('location','LIKE',"%{$query}%")
        ->paginate(6);
        return view('admin.cartadmin',compact('carts','query'));
    }
    //view the cart
    public function viewcart($id){
        $cart = Cart::findOrFail($id);
        return view('admin.viewcart', compact('cart'));
    }
    //edit the chosen cart
    public function editdata($id)
    {
    $cart = Cart::findOrFail($id);
    return view('admin.editcart', compact('cart'));
    }
    //after edit - update the cart
    public function updatecart(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|string',
            'cost' => 'required|string',
            'vehicle' => 'required|string',
            'from' => 'required|date',
            'to' => 'required|date',
            'overview' => 'required|string',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->title = $request->title;
        $cart->location = $request->location;
        $cart->image = $request->image;
        $cart->cost = $request->cost;
        $cart->vehicle = $request->vehicle;
        $cart->from = $request->from;
        $cart->to = $request->to;
        $cart->overview = $request->overview;
        $cart->save();

        return redirect()->route('editdata', $cart->id)->with('success', 'Cart updated successfully.');
    }
    //delete the chosen cart
    public function deleteCart($id){
        $cart=Cart::find($id);
        if($cart->delete()){
            return redirect()->route('cartadmin')->with('success', 'Cart deleted successfully');
        } else {
            return redirect()->route('cartadmin')->with('error', 'Cart not found');
        }

    }
    //add new cart -enter the cart
    public function addNewCart(){
        return view('admin.addnewcart');
    }
    //update new cart
    public function updatenewcart(Request $request)
    {
    $request->validate([
        'image' => 'required|string',
        'title' => 'required|string',
        'location' => 'required|string',
        'cost' => 'required|numeric',
        'vehicle' => 'required|string',
        'rating' => 'required|numeric|between:1,5',
        'from' => 'required|date',
        'to' => 'required|date',
        'overview' => 'required|string',
    ]);

    $cart = new Cart();
    $cart->image = $request->input('image');
    $cart->title = $request->input('title');
    $cart->location = $request->input('location');
    $cart->cost = $request->input('cost');
    $cart->vehicle = $request->input('vehicle');
    $cart->rating = $request->input('rating');
    $cart->from = $request->input('from');
    $cart->to = $request->input('to');
    $cart->overview = $request->input('overview');
    $cart->save();

    return redirect()->route('addnewcart')->with('success', 'Cart added successfully.');
}
}
