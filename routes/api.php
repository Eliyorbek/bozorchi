<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DistanceController;
use App\Http\Controllers\Api\KuryerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupCategoryController;

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



Route::controller(UserController::class)->group(function () {
    Route::get('/user/{id}', 'getUser');
    Route::post('/user/register', 'register');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

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
    Route::post('/products/{id}' , 'addToCart');
    Route::get('/add-to-cart' , 'getCart');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/order' , 'orderSave');
});

Route::controller(DistanceController::class)->group(function () {
    Route::post('/delivery-price' , 'deliveryPrice');
});



