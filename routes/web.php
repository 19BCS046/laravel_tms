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

// Opening page
Route::get('/', function () {
    return view('includes.log_home');
});
Route::get('unauthorization', [LoginController::class, 'unauthorization'])->name('unauthorization');

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', function() {
    return view('login');
})->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot password routes
Route::get('forgot_password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');

// Reset password routes
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.forgot.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.forgot.post');

// User panel routes
Route::middleware(['auth', 'user'])->group(function () {
    //home
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    //cart-nw
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

    //tourist cart
    Route::get('cart', [TouristCartController::class, 'touristCart']);

    //specific cart detail
    Route::get('/cartdetails/{id}', [TouristCartController::class, 'cartDetails']);

    //search the tourist cart
    Route::get('/search', [TouristCartController::class, 'search'])->name('search');

    //top toristplace
    Route::get('/topplace', [TouristCartController::class, 'topTouristPlace'])->name('topplace');
    //Bookings
    Route::post('/book/{id}', [TouristCartController::class, 'book'])->name('book');
    Route::get('/mycart', [TouristCartController::class, 'mycart'])->name('mycart');

    //Edit profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //change Password
    Route::post('/updatepassword', [ProfileController::class, 'updatePassword'])->name('updatepassword');

});

// Multiple languages route
Route::get('lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

// Admin panel routes
Route::middleware(['auth', 'admin'])->group(function () {
    //dashboard
    Route::get('admin', [DashboardController::class, 'admin'])->name('admin');

    //all users
    Route::get('users', [UserController::class, 'adminUser'])->name('adminUser');
    Route::get('searchuser', [UserController::class, 'searchUser'])->name('searchuser');
    Route::post('userpagination', [UserController::class, 'userPagination'])->name('userpagination');
    Route::get('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    //Making admin or not admin
    Route::get('makeadmin/{id}', [UserController::class, 'makeAdmin'])->name('makeadmin');
    Route::post('updateadmin/{id}', [UserController::class, 'updateAdmin'])->name('updateadmin');

    //carts
    Route::get('cartadmin', [CartadminController::class, 'cartadmin'])->name('cartadmin');
    Route::get('searchadmin', [CartadminController::class, 'search'])->name('searchadmin');

    //view cart
    Route::post('viewcart/{id}', [CartadminController::class, 'viewcart'])->name('viewcart');

    //editcart
    Route::get('editdata/{id}', [CartadminController::class, 'editdata'])->name('editdata');
    Route::post('updatecart/{id}', [CartadminController::class, 'updatecart'])->name('updatecart');

    //delete cart
    Route::get('deleteCart/{id}', [CartadminController::class, 'deleteCart'])->name('deleteCart');

    //addnew cart
    Route::get('addnewcart', [CartadminController::class, 'addnewcart'])->name('addnewcart');
    Route::post('updatenewcart', [CartadminController::class, 'updateNewCart'])->name('updatenewcart');

    //booked carts
    Route::get('bookedcarts', [BookedCartsController::class, 'bookedCart'])->name('bookedcarts');
    Route::get('searchbookedcart', [BookedCartsController::class, 'search'])->name('searchbookedcart');
    Route::post('bookedcartdetail/{id}', [BookedCartsController::class, 'bookedCartDetails'])->name('bookedcartdetail');


    //delete the booked cart
    Route::get('deletebookedcart/{id}', [BookedCartsController::class, 'deleteBookedCart'])->name('deletebookedcart');
});
