<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Booking\ServiceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Common\CommonTaskController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Orders\AdminSellerOrderController;
use App\Http\Controllers\Seller\AppointmentsController;
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

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

///////////////////// SHOP ///////////////////////////////

Route::controller(\App\Http\Controllers\Shop\ProductController::class)->group(function () {
    Route::get('shop','index')->name('shop');
    Route::get('shop/detail/{product}','detail')->name('detail');
});

//////////////////////////////////////////////////////////////////

Route::middleware(['middleware' => 'prevent.back.history'])->group(function () {
    Auth::routes();
});

Route::group(['prefix' => "categories"], function () {
    Route::get('get-sub-categories/{id}', [ProductSubCategoryController::class, 'getSubCategoriesAjax'])->name('getSubCategories');
    Route::get('get-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'getSubSubCategoriesAjax'])->name('getSubSubCategories');
});

Route::group(['middleware' => ['auth', 'prevent.back.history']], function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::group(['middleware' => 'admin'], function () {

        Route::resource('products', ProductController::class);
        Route::post('products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle');

        Route::get('categories', [ProductCategoryController::class, 'index'])->name('categories.index');

        Route::group(['prefix' => "categories"], function () {
            Route::post('store-sub-categories', [ProductSubCategoryController::class, 'storeSubCategoryAjax'])->name('storeSubCategories');
            Route::post('store-sub-sub-categories', [ProductSubSubCategoryController::class, 'storeSubSubCategoryAjax'])->name('storeSubSubCategories');

            Route::get('create-sub-categories', [ProductSubCategoryController::class, 'create'])->name('subCategory.create');
            Route::get('edit-sub-categories/{id}', [ProductSubCategoryController::class, 'edit'])->name('subCategory.edit');
            Route::post('update-sub-categories/{id}', [ProductSubCategoryController::class, 'update'])->name('subCategory.update');
            Route::post('delete-sub-categories/{id}', [ProductSubCategoryController::class, 'destroy'])->name('subCategory.destroy');

            Route::get('create-sub-sub-categories', [ProductSubSubCategoryController::class, 'create'])->name('subSubCategory.create');
            Route::get('edit-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'edit'])->name('subSubCategory.edit');
            Route::post('update-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'update'])->name('subSubCategory.update');
            Route::post('delete-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'destroy'])->name('subSubCategory.destroy');
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

    //////////// Admin Seller Common Routes /////////////////////////
    Route::group(['middleware' => 'ascommon'], function () {
        Route::resource('products', ProductController::class);

        Route::group(['prefix' => 'orders'], function () {
            Route::get('all-orders', [AdminSellerOrderController::class, 'checkAllOrders'])->name('all-orders');
        });
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

    ///////////////////////////// CUSTOMER ////////////////////////////////////
    Route::group(['middleware' => 'customer'], function () {

        /////////////////////////// CART //////////////////////////////////////
        Route::controller(CartController::class)->group(function () {
            Route::get('view-cart', 'viewCart')->name('view-cart');
            Route::get('add-product-to-cart/{product}', 'addToCart')->name('add-to-cart');
            Route::post('update-cart/{cart}', 'updateCart')->name('update-cart');
            Route::get('delete-cart/{cart}', 'deleteCart')->name('delete-cart');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('proceed-to-checkout', 'proceedToCheckout')->name('proceed-checkout');
            Route::get('checkout-address', 'checkoutAddress')->name('checkout-address');
            Route::get('checkout-delivery-method', 'checkoutDeliveryMethod')->name('delivery-method');
            Route::get('checkout-payement-method', 'checkoutPaymentMethod')->name('payement-method');
            Route::post('confirm-order', 'confirmOrder')->name('confirm-order');

        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('your-orders', [OrderController::class, 'checkYourOrders'])->name('your-orders');
        });
    });
});

Route::get('get-browser-info', function(Request $request){
    dd($request->userAgent());
});
