<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        public function adminUser(Request $request)
        {
            $users = User::paginate(6);

            if ($request->ajax()) {
                return response()->json([
                    'data' => $users->items(),
                    'links' => $users->links()->toHtml(),
                ]);
            }

            return view('admin.user', compact('users'));
        }

        public function deleteUser($id) {
            $user = User::find($id);
            if ($user->delete()) {
                return redirect()->route('adminUser')->with('success', 'User deleted successfully');
            } else {
                return redirect()->route('adminUser')->with('error', 'User not found');
            }
        }


    public function showDashboard(){
        $totalusers=User::count();
        return view('admin.dashboard',compact('totalusers'));

    }
    public function searchUser(Request $request)
{
    $query = $request->input('search');
    $users = User::where('name', 'LIKE', "%{$query}%")
                 ->orWhere('city', 'LIKE', "%{$query}%")
                 ->paginate(6);

    if ($request->ajax()) {
        return response()->json([
            'data' => $users->items(),
            'links' => $users->links()->toHtml(),
        ]);
    }

    return view('admin.user', compact('users'));
}


}
