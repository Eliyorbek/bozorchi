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

Route::middleware('auth:api')->get('user', [UserController::class, 'me']);

Route::middleware('auth:api')->group(function () {
    Route::get('/allAddToCard/{id}' , [\App\Http\Controllers\Api\ProductsController::class , 'getCart']);
    Route::get('/contact'  , [\App\Http\Controllers\Api\ContactController::class , 'index']);
    Route::get('/faq'  , [\App\Http\Controllers\Api\FaqController::class , 'index']);
    Route::get('/about' , [\App\Http\Controllers\Backend\AboutController::class , 'allAbout']);
    Route::get('/my-order/{id}' , [MyOrderController::class , 'myOrder']);
    Route::get('/my-order-item/{id}' , [MyOrderController::class , 'myOrderItem']);
});

Route::get('/banner' , [BannerController::class , 'index']);
Route::get('/banner/action-url/{slug}' , [BannerController::class , 'bannerOne']);
Route::get('/free-price' , [DistanceController::class , 'price']);
Route::get('/categories' , [CategoryController::class , 'allCategories']);
Route::get('/categories/{id}' , [CategoryController::class , 'getCategory']);
Route::get('/sup-category' , [SupCategoryController::class , 'allSupCategory']);
Route::get('/products' , [\App\Http\Controllers\Api\ProductsController::class , 'allProducts']);
Route::get('/product/{id}' , [\App\Http\Controllers\Api\ProductsController::class , 'oneProduct']);
Route::get('/products/{id}' , [\App\Http\Controllers\Api\ProductsController::class , 'ProductFiltrCategory']);
Route::get('/products/sup-category/{id}' , [\App\Http\Controllers\Api\ProductsController::class , 'ProductFiltrSupCategory']);

//Route login google auth bilan emas
Route::post('/login', [UserController::class , 'loginAuth']);

//Refresh-token route
Route::post('/refresh-token', [UserController::class, 'refreshToken']);
//Auth-google route
Route::post('/auth-google', [UserController::class, 'authGoogle']);
//Get user route
Route::get('/user/{id}' , [UserController::class , 'getUser']);
// add-to-card and reduce-card route
Route::controller(\App\Http\Controllers\Api\ProductsController::class)->group(function () {
    Route::post('/add-to-cart' , 'addToCart');
    Route::post('/remove-cart' , 'reduceCard');
});
//Order route
Route::controller(OrderController::class)->group(function () {
    Route::post('/order' , 'orderSave');
});
//Route distance --- locatsion oraliq masofani yetkazib berishini hisoblash
Route::controller(DistanceController::class)->group(function () {
    Route::post('/delivery-price' , 'deliveryPrice');
});
//Multiple search rotue
Route::post('/search' , [SearchController::class, 'search']);

//Comment route
Route::post('/comment' , [\App\Http\Controllers\Api\CommentController::class , 'store']);



