<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CartUser;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        $totalUsers=User::count();
        $bookedCarts=CartUser::count();

        return view('admin.dashboard',compact('totalUsers','bookedCarts'));
    }

}
