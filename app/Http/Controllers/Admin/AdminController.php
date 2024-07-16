<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.dashboard');
    }
    public function adminUser(){
        return view('admin.user');
    }
}
