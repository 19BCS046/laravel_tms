<?php

use App\Http\Controllers\Admin\BookedCartsController;
use App\Http\Controllers\Admin\CartadminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\TouristCartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//opening page
Route::get('/', function () {
    return view('home');
});

//login page
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', function() {
    return view('login');
})->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//forgot password
Route::get('forgot_password',[ForgotPasswordController::class,'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password',[ForgotPasswordController::class,'submitForgotPasswordForm'])->name('forgot.password.post');

//reset password
Route::get('reset-password/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.forgot.get');
Route::post('reset-password',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.forgot.post');

//Project content starts
Route::middleware('auth')->get('/home',[HomeController::class,'home'])->name('home');
Route::middleware('auth')->get('/cart',[HomeController::class,'cart'])->name('cart');

//cart content
Route::middleware('auth')->get('cart',[TouristCartController::class,'touristCart']);

//cart fulldetails
Route::middleware('auth')->get('/cartdetails/{id}', [TouristCartController::class, 'cartDetails']);

//search the carts
Route::get('/search', [TouristCartController::class, 'search'])->name('search');

//top places
Route::get('/topplace', [TouristCartController::class, 'topTouristPlace'])->name('topplace');

//Booked cart
Route::post('/book/{id}', [TouristCartController::class, 'book'])->name('book');
Route::middleware('auth')->get('/mycart', [TouristCartController::class, 'mycart'])->name('mycart');

//Edit profile
Route::middleware('auth')->get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

//Multiple Languages
Route::get('lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

//Admin panel
Route::middleware('auth')->get('admin',[DashboardController::class,'admin'])->name('admin');
Route::middleware('auth')->get('dashboard',[DashboardController::class,'admin'])->name('admin');


//users
Route::middleware('auth')->get('users',[UserController::class,'adminUser'])->name('adminUser');
Route::post('deleteUser/{id}',[UserController::class,'deleteUser'])->name('deleteUser');

// carts/viewcart/editcart/addcart
Route::middleware('auth')->get('cartadmin',[CartadminController::class,'cartadmin'])->name('cartadmin');
//search
Route::middleware('auth')->get('searchadmin',[CartadminController::class,'search'])->name('searchadmin');
//viewcart
Route::middleware('auth')->post('viewcart/{id}', [CartadminController::class, 'viewcart'])->name('viewcart');
//editcart
Route::middleware('auth')->get('editdata/{id}', [CartadminController::class, 'editdata'])->name('editdata');
Route::middleware('auth')->post('updatecart/{id}', [CartadminController::class, 'updatecart'])->name('updatecart');
//deletecart
Route::middleware('auth')->post('deleteCart/{id}',[CartadminController::class,'deleteCart'])->name('deleteCart');
//addnewcart
Route::middleware('auth')->get('addnewcart',[CartadminController::class,'addnewcart'])->name('addnewcart');
Route::middleware('auth')->post('updatenewcart',[CartadminController::class,'updateNewCart'])->name('updatenewcart');

//Booked carts
Route::middleware('auth')->get('bookedcarts',[BookedCartsController::class,'bookedCart'])->name('bookedcarts');
//search booked carts
Route::middleware('auth')->get('searchbookedcart',[BookedCartsController::class,'search'])->name('searchbookedcart');
//view -Booked cart
Route::middleware('auth')->post('bookedcartdetail/{id}',[BookedCartsController::class,'bookedCartDetails'])->name('bookedcartdetail');
//delete-Booked Cart
Route::middleware('auth')->post('deletebookedcart/{id}',[BookedCartsController::class,'deleteBookedCart'])->name('deletebookedcart');
