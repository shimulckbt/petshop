<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\Category\ProductCategoryController;
use App\Http\Controllers\Product\Category\ProductSubCategoryController;
use App\Http\Controllers\Product\Category\ProductSubSubCategoryController;

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
    return view('guest.index');
})->name('welcome');

Route::middleware(['middleware' => 'prevent.back.history'])->group(function () {
    Auth::routes();
});


Route::group(['middleware' => ['auth', 'prevent.back.history']], function () {
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::group(['middleware' => 'admin'], function () {
        
        Route::group(['prefix' => "products"], function(){
            Route::resource('categories', ProductCategoryController::class)->only('index');
            Route::get('get-sub-categories/{id}', [ProductSubCategoryController::class, 'getSubCategoriesAjax'])->name('getSubCategories');
            Route::get('get-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'getSubSubCategoriesAjax'])->name('getSubSubCategories');
        });
        
    });
    
    Route::group(['middleware' => 'seller'], function () {
    
    });
    
    Route::group(['middleware' => 'customer'], function () {
    
    });

});

