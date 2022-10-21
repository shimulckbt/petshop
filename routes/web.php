<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Booking\AppointmentTakerController;
use App\Http\Controllers\Booking\ServiceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Common\CommonTaskController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Orders\AdminSellerOrderController;
use App\Http\Controllers\Seller\AppointmentsController;
use App\Http\Controllers\Product\Category\ProductCategoryController;
use App\Http\Controllers\Product\Category\ProductSubCategoryController;
use App\Http\Controllers\Product\Category\ProductSubSubCategoryController;
use App\Http\Controllers\WishListController;

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

// Route::get('/', function () {
//     $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
//     return view('guest.index', compact('sliders'));
// })->name('welcome');

Route::get('/', function () {
    return view('guest.index');
})->name('welcome');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

///////////////////// SHOP ///////////////////////////////

Route::controller(\App\Http\Controllers\Shop\ProductController::class)->group(function () {
    Route::get('shop', 'index')->name('shop');
    Route::get('shop/detail/{product}', 'detail')->name('detail');
});

Route::get('breed/{id}', [ProductSubSubCategoryController::class, 'breedOrBrand'])->name('breed');

//////////////////////////////////////////////////////////////////

Route::middleware(['middleware' => 'prevent.back.history'])->group(function () {
    Auth::routes();
});

Route::group(['prefix' => "categories"], function () {
    Route::get('get-sub-categories/{id}', [ProductSubCategoryController::class, 'getSubCategoriesAjax'])->name('getSubCategories');
    Route::get('get-sub-sub-categories/{id}', [ProductSubSubCategoryController::class, 'getSubSubCategoriesAjax'])->name('getSubSubCategories');
});
Route::get('/new-appointment/{sellerId}/{date}', [ServiceController::class, 'show'])->name('create.appointment');

Route::group(['middleware' => ['auth', 'prevent.back.history']], function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => "customer-appointments"], function () {
            Route::get('taker', [AppointmentTakerController::class, 'index'])->name('appointment.taker');
            Route::get('/customer/all', [AppointmentTakerController::class, 'allTimeAppointment'])->name('all.appointments');
            Route::get('/status/update/{id}', [AppointmentTakerController::class, 'toggleStatus'])->name('update_appointment.status');
            Route::resource('department', 'DepartmentController');
        });

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

        Route::prefix('slider')->group(function () {
            Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
            Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
            Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
            Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
            Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
            Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        });

        Route::prefix('reviews')->group(function () {
            Route::get('/all', [ReviewController::class, 'allReview'])->name('all.review');
            Route::get('/pending', [ReviewController::class, 'pendingReview'])->name('pending.review');
            Route::get('/admin/approve/{id}', [ReviewController::class, 'reviewApprove'])->name('review.approve');
            Route::get('/admin/inapprove/{id}', [ReviewController::class, 'reviewInApprove'])->name('review.inapprove');
            Route::get('/publish', [ReviewController::class, 'publishReview'])->name('publish.review');
            Route::get('/delete/{id}', [ReviewController::class, 'deleteReview'])->name('delete.review');
        });
    });


    ////////////             Seller Middleware Section           //////////////

    Route::group(['middleware' => 'seller'], function () {
        Route::get('appointments/all', [AppointmentTakerController::class, 'sellersAllAppointments'])->name('sellersAllAppointments');
        Route::get('/customer-status/update/{id}', [AppointmentTakerController::class, 'toggleStatus'])->name('update.status');

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

            Route::post('approve-order/{order}', [AdminSellerOrderController::class, 'approveOrder'])->name('approve-order');
            Route::post('decline-order/{order}', [AdminSellerOrderController::class, 'declineOrder'])->name('decline-order');

            Route::post('approve-delivery/{order}', [AdminSellerOrderController::class, 'approveDelivery'])->name('approve-delivery');
            Route::post('decline-delivery/{order}', [AdminSellerOrderController::class, 'declineDelivery'])->name('decline-delivery');
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
        Route::post('customers/book-appointment', [ServiceController::class, 'store'])->name('booking.appointment');
        Route::get('customers/my-appointments', [ServiceController::class, 'myAppointments'])->name('my.appointment');

        /////////////////////////// CART //////////////////////////////////////
        Route::controller(CartController::class)->group(function () {
            Route::get('view-cart', 'viewCart')->name('view-cart');
            Route::get('add-product-to-cart/{product}', 'addToCart')->name('add-to-cart');
            Route::post('update-cart/{cart}', 'updateCart')->name('update-cart');
            Route::get('delete-cart/{cart}', 'deleteCart')->name('delete-cart');
        });

        Route::get('add-to-wish-list/{id}', [WishListController::class, 'addToWishList'])->name('addWish');
        Route::get('remove-from-wish-list/{id}', [WishListController::class, 'removeFromWishList'])->name('removeWish');
        Route::get('wish-list', [WishListController::class, 'checkWishList'])->name('viewWish');

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

Route::group(['prefix' => 'review'], function () {
    // Route::post();
});

/// Frontend Product Review Routes

Route::post('/review-store', [ReviewController::class, 'reviewStore'])->name('review.store');


Route::get('get-browser-info', function (Request $request) {
    dd($request->userAgent());
});
