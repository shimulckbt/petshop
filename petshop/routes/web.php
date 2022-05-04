<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\ClientController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    // Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });
});

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'auth']], function () {
    // Route::get('dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
    Route::controller(SellerController::class)->group(function () {
        Route::get('dashboard', 'index')->name('seller.dashboard');
    });
});

Route::group(['prefix' => 'client', 'middleware' => ['client', 'auth']], function () {
    // Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::controller(ClientController::class)->group(function () {
        Route::get('dashboard', 'index')->name('user.dashboard');
    });
});
