<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminUser(){
        $users=User::paginate(10);
        return view('admin.user',compact('users'));
    }
    public function deleteUser($id){
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

}
