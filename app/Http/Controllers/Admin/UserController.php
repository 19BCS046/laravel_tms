<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\PrintUsersJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminUser(Request $request)
    {
        $perPage = $request->input('userpage', 6);
        $users = User::paginate($perPage);

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
        if ($user && $user->delete()) {
            return redirect()->route('adminUser')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('adminUser')->with('error', 'User not found');
        }
    }

    public function searchUser(Request $request)
    {
        $query = $request->input('search');
        $perPage = $request->input('userpage', 6);
        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('city', 'LIKE', "%{$query}%")
                     ->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'data' => $users->items(),
                'links' => $users->links()->toHtml(),
            ]);
        }
        return view('admin.user', compact('users'));
    }

    public function makeAdmin($id)
    {
        $users = User::find($id);
        return view('admin.makeadmin', compact('users'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'is_admin' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->is_admin;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function userPagination(Request $request)
    {
        $perPage = $request->input('userpage', 4);
        $users = User::paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'data' => $users->items(),
                'links' => $users->links()->toHtml(),
            ]);
        }

        return view('admin.user', compact('users'));
    }
    public function downloadUsers()
    {
        PrintUsersJob::dispatch();
        return back()->with('success', 'CSV file downloaded successfully');
    }
}
