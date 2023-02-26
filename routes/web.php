<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin views 
Route::prefix('/admin')->group(function () {
    // admin Login

    Route::view('/login', 'admin.login')->name('admin.login');
    Route::post('/authenticator', [AdminController::class, 'adminAuthenticate'])->name('admin.authenticate');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/logout', [AdminController::class, 'logout']);

        Route::view('/settings', 'admin.settings')->name('admin.settingsPage');

        Route::post('/check-current-admin-password', [AdminController::class, 'checkAdminPassword'])->name('admin.checkPassword');

        Route::post('/update-admin-password', [AdminController::class, 'updateAdminPassword'])->name('admin.updatePassword');

        // UPDATE ADMIN DETAILS

        Route::post('/update-admin-profile', [AdminController::class,'updateAdminProfile'])->name('admin.updateProfile');

        //admin dashboard Route
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    });
});



// onlinevendor views 
Route::prefix('/vendor')->group(function () {
    // onlineVendor Login
    Route::view('/login', 'onlineVendor.login')->name('vendor.login');
    Route::view('/register', 'onlineVendor.register')->name('vendor.register');;
    //onlineVendor dashboard Route
    Route::view('/dashboard', 'onlineVendor.dashboard')->name('vendor.dashboard');
});
