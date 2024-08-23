<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartUser;
use Illuminate\Http\Request;

class BookedCartsController extends Controller
{
    // Search the booked cart
    public function search(Request $request)
    {
        $query = $request->input('search');
        $perPage = $request->input('perPage', 6);

        $cartUsers = CartUser::whereHas('cart', function ($queryBuilder) use ($query) {
                            $queryBuilder->where('title', 'LIKE', "%{$query}%")
                                         ->orWhere('location', 'LIKE', "%{$query}%");
                        })
                        ->orWhereHas('user', function ($queryBuilder) use ($query) {
                            $queryBuilder->where('name', 'LIKE', "%{$query}%");
                        })
                        ->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'data' => $cartUsers->items(),
                'links' => $cartUsers->links()->toHtml(),
            ]);
        }

        return view('admin.bookedcarts', compact('cartUsers', 'query'));
    }

    // Booked cart table
    public function bookedCart(Request $request)
    {
        $perPage = $request->input('perPage', 6);

        $cartUsers = CartUser::with('cart', 'user')->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'data' => $cartUsers->items(),
                'links' => $cartUsers->links()->toHtml(),
            ]);
        }

        return view('admin.bookedcarts', compact('cartUsers'));
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
        $cartUser = CartUser::find($id);
        if ($cartUser && $cartUser->delete()) {
            return redirect()->route('bookedcarts')->with('success', 'Booked cart deleted successfully');
        } else {
            return redirect()->route('bookedcarts')->with('error', 'Booked cart not found');
        }
    }
}
