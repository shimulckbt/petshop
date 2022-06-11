<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Common\CommonTaskController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\Category\ProductCategoryController;
use App\Http\Controllers\Product\Category\ProductSubCategoryController;
use App\Http\Controllers\Product\Category\ProductSubSubCategoryController;
use App\Models\Role;

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

        Route::group(['prefix' => "products"], function () {
            Route::resource('categories', ProductCategoryController::class)->only('index');

            Route::get('get-sub-categories/{id}', [ProductSubCategoryController::class, 'getSubCategoriesAjax'])->name('getSubCategories');
            Route::post('store-sub-categories', [ProductSubCategoryController::class, 'storeSubCategoryAjax'])->name('storeSubCategories');

            Route::get('get-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'getSubSubCategoriesAjax'])->name('getSubSubCategories');
            Route::post('store-sub-sub-categories', [ProductSubSubCategoryController::class, 'storeSubSubCategoryAjax'])->name('storeSubSubCategories');

            Route::get('create-sub-categories', [ProductSubCategoryController::class, 'create'])->name('subCategory.create');
            Route::get('create-sub-sub-categories', [ProductSubSubCategoryController::class, 'create'])->name('subSubCategory.create');;
        });


        ///////////////           Verify Seller             ////////////////

        Route::group(['prefix' => "seller"], function () {
            Route::get('manage-all', [SellerController::class, 'showAllSellers'])->name('showAllSellers');
            Route::get('manage-verification/{id}', [SellerController::class, 'verifySeller'])->name('verifySeller');
            Route::get('manage-cancel-verification/{id}', [SellerController::class, 'cancelVerificationOfSeller'])->name('cancelVerificationOfSeller');
        });
    });

    Route::group(['middleware' => 'seller'], function () {
        // Route::get('seller-details-form', [SellerController::class, 'getSellerDetails'])->name('getSellerDetails');
        Route::post('seller-details-form-submit', [SellerController::class, 'storeSellerDetails'])->name('storeSellerDetails');
    });

    ////////////          Profile Change Route              //////////////

    Route::group(['prefix' => 'profile'], function () {
        Route::get('change-photo', [CommonTaskController::class, 'changeProfilePhotoView'])->name('changeProfilePhotoView');
        Route::post('change-photo-request-submit', [CommonTaskController::class, 'profilePhotoChangeRequestSubmit'])->name('profilePhotoChangeRequestSubmit');
    });

    Route::group(['middleware' => 'customer'], function () {
    });
});
