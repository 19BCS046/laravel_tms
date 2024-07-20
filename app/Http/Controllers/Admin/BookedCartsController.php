<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cart;
use Illuminate\Http\Request;

class BookedCartsController extends Controller
{
    // Search the booked cart
    public function search(Request $request)
    {
        $query = $request->input('search');
        $carts = Booking::where('username', 'LIKE', "%{$query}%")
                    ->orWhere('title', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")
                    ->orWhere('status', 'LIKE', "%{$query}%")
                    ->paginate(6);

    if ($request->ajax()) {
        return response()->json([
            'data' => $carts->items(),
            'links' => $carts->links()->toHtml(),
        ]);
    }
        return view('admin.bookedcarts', compact('carts', 'query'));
    }

    // Booked cart table
    public function bookedCart(Request $request)
    {
        $carts = Booking::paginate(6);

        if ($request->ajax()) {
            return response()->json([
                'data' => $carts->items(),
                'links' => $carts->links()->toHtml(),
            ]);
        }
        return view('admin.bookedcarts', compact('carts'));
    }

    // View the booked cart
    public function bookedCartDetails($id)
    {
        $cart = Cart::findOrFail($id);
        return view('admin.viewcart', compact('cart'));
    }

    // Delete the booked cart
    public function deleteBookedCart($id)
    {
        $booking = Booking::find($id);
        if ( $booking->delete()) {
            return redirect()->route('bookedcarts')->with('success', 'BookedCart deleted successfully');
        } else {
            return redirect()->route('bookedcarts')->with('error', 'BookedCart not found');
        }
    }
}
