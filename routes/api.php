<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DistanceController;
use App\Http\Controllers\Api\KuryerController;
use App\Http\Controllers\Api\MyOrderController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupCategoryController;
use Illuminate\Session\Middleware\StartSession;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});





Route::middleware(['api', StartSession::class])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'getUser');
        Route::get('/auth/google', 'googleAuth');
        Route::get('/auth/google/callback', 'handleGoogleCallback');
    });
});

Route::get('/user/{id}' , [UserController::class , 'getUser']);

Route::get('kuryer/login' , [KuryerController::class, 'login']);

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories' , 'allCategories');
    Route::post('/categories/{id}' , 'getCategory');
});
Route::controller(SupCategoryController::class)->group(function () {
    Route::get('/sup-category' , 'allSupCategory');
});
Route::controller(\App\Http\Controllers\Api\ProductsController::class)->group(function () {
    Route::get('/products' , 'allProducts');
    Route::get('/products/{id}' , 'ProductFiltrCategory');
    Route::get('/products/sup-category/{id}' , 'ProductFiltrSupCategory');
    Route::post('/add-to-cart' , 'addToCart');
    Route::post('/reduce-cart' , 'reduceCard');
    Route::get('/allAddToCard/{id}' , 'getCart');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/order' , 'orderSave');
});

Route::controller(DistanceController::class)->group(function () {
    Route::post('/delivery-price' , 'deliveryPrice');
});

Route::post('/search' , [SearchController::class, 'search']);
Route::get('/banner' , [BannerController::class , 'index']);
Route::get('/banner/action-url' , [BannerController::class , 'bannerOne']);
Route::get('/my-order/{id}' , [MyOrderController::class , 'myOrder']);


