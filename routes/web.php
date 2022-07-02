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
use App\Http\Controllers\Seller\AppointmentsController;
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

        ///////////////           Verify Seller and Manage Seller             ////////////////

        Route::group(['prefix' => "seller"], function () {
            Route::get('manage-all', [SellerController::class, 'showAllSellers'])->name('showAllSellers');
            Route::get('manage-verification/{id}', [SellerController::class, 'verifySeller'])->name('verifySeller');
            Route::get('manage-cancel-verification/{id}', [SellerController::class, 'cancelVerificationOfSeller'])->name('cancelVerificationOfSeller');
            Route::get('delete/{id}', [SellerController::class, 'deleteSeller'])->name('seller.delete');
            Route::get('edit/{id}', [SellerController::class, 'editSeller'])->name('seller.edit');
            Route::post('update/{id}', [SellerController::class, 'updateSeller'])->name('seller.update');
        });
    });


    ////////////             Seller Middleware Section           //////////////

    Route::group(['middleware' => 'seller'], function () {
        Route::post('seller-details-form-submit', [SellerController::class, 'storeSellerDetails'])->name('storeSellerDetails');
        Route::get('seller-details-form', [SellerController::class, 'showChangeDetailsView'])->name('showChangeDetailsView');
        Route::post('seller-details-update', [SellerController::class, 'updateSellerDetails'])->name('updateSellerDetails');

        Route::resource('appointments', AppointmentsController::class);

        Route::post('appointments/check', [AppointmentsController::class, 'check'])->name('appointments.check');

        Route::post('appointments/update-time', [AppointmentsController::class, 'updateTime'])->name('update.time');
    });

    ////////////          Profile Change Route              //////////////

    Route::group(['prefix' => 'profile'], function () {
        Route::get('change-photo', [CommonTaskController::class, 'showChangeProfilePhotoView'])->name('showChangeProfilePhotoView');
        Route::post('change-photo-request-submit', [CommonTaskController::class, 'profilePhotoChangeRequestSubmit'])->name('profilePhotoChangeRequestSubmit');
        Route::get('change-password', [CommonTaskController::class, 'showChangePasswordView'])->name('showChangePasswordView');
        Route::post('change-password-request-submit', [CommonTaskController::class, 'changePasswordRequestSubmit'])->name('changePasswordRequestSubmit');
        Route::get('change-general-information', [CommonTaskController::class, 'showGeneralInformationView'])->name('showGeneralInformationView');
        Route::post('change-general-information-request-submit', [CommonTaskController::class, 'changeGeneralInfoRequestSubmit'])->name('changeGeneralInfoRequestSubmit');
    });

    Route::group(['middleware' => 'customer'], function () {
    });
});
