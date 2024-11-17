<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Backend\ProductController;
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
    Route::get('/user/{id}' , 'getUser');
    Route::post('/user/register' , 'register');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories' , 'allCategories');
    Route::post('/categories/{id}' , 'getCategory');
});
Route::controller(SupCategoryController::class)->group(function () {
    Route::get('/sup-category' , 'allSupCategory');
});
//Route::controller(ProductController::class)->group(function () {});



