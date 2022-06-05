<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Product\Category\ProductCategoryController;
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
    return view('client.index');
})->name('welcome');

Route::middleware(['middleware' => 'prevent.back.history'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin', 'auth', 'prevent.back.history']], function () {
    
    Route::group(['prefix' => "products"], function(){
        Route::resource('categories', ProductCategoryController::class)->only('index');
    });
    
    Route::controller(AdminController::class)->group(function () {
        Route::get('panel', 'index')->name('panel');
    });
});

Route::group(['middleware' => ['seller', 'auth', 'prevent.back.history']], function () {
    Route::controller(SellerController::class)->group(function () {
        // Route::get('dashboard', 'index')->name('seller.dashboard');
    });
});

Route::group(['middleware' => ['client', 'auth', 'prevent.back.history']], function () {
    Route::controller(ClientController::class)->group(function () {
        // Route::get('home', 'index')->name('client.dashboard');
    });
});
