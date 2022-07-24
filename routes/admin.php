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
        Route::get('/become-merchants/{id}/activated', [BecomeMerchantController::class, 'activated']);
        Route::get('/become-merchants/{id}/deactivated', [BecomeMerchantController::class, 'deactivated']);
        Route::get('/settings', [SettingController::class, 'index']);
        Route::put('/update-settings', [SettingController::class, 'update']);
        Route::get('/static-pages', [StaticPageController::class, 'index']);
        Route::put('/update-static-pages', [StaticPageController::class, 'update']);
    });
});
