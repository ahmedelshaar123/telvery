<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BecomeMerchantController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ReplyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
    ], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/governorates', GovernorateController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/contacts', ContactController::class);
        Route::resource('/reviews', ReviewController::class);
        Route::resource('/replies', ReplyController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/sub-categories', SubCategoryController::class);
        Route::resource('/become-merchants', BecomeMerchantController::class);
        Route::resource('/faq', FAQController::class);
        Route::resource('/payment-methods', PaymentMethodController::class);
        Route::resource('/coupons', CouponController::class);
        Route::resource('/coupons', CouponController::class);
        Route::resource('/coupons', CouponController::class);
        Route::resource('/orders', OrderController::class);
        Route::put('/order-status/{id}', [OrderController::class, 'setOrderStatus'])->name('order-status');
        Route::resource('/clients', ClientController::class);
        Route::get('/clients/{id}/activated', [ClientController::class, 'activated']);
        Route::get('/clients/{id}/deactivated', [ClientController::class, 'deactivated']);
        Route::get('/become-merchants/{id}/activated', [BecomeMerchantController::class, 'activated']);
        Route::get('/become-merchants/{id}/deactivated', [BecomeMerchantController::class, 'deactivated']);
        Route::get('/settings', [SettingController::class, 'index']);
        Route::put('/update-settings', [SettingController::class, 'update']);
        Route::get('/static-pages', [StaticPageController::class, 'index']);
        Route::put('/update-static-pages', [StaticPageController::class, 'update']);
        Route::resource('users', UserController::class);
        Route::get('users/{email}/{phone}/create', [UserController::class, 'create2']);
        Route::get('users/{id}/activated', [UserController::class, 'activated']);
        Route::get('users/{id}/deactivated', [UserController::class, 'deactivated']);
        Route::get('users/edit-profile/{id}',[UserController::class, 'editProfile']);
        Route::put('users/update-profile/{id}',[UserController::class, 'updateProfile']);
    });
});
