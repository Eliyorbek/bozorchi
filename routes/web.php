<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\MyProfileController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductIncomeController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\SupController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Kuryer\KuryerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DeliveryController;
use App\Http\Controllers\Backend\DeliveredController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Backend\BannerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('admin')->group(function(){
        Route::get('/' , function(){
            $title = 'Dashboard';
            $subtitle ='Dashboard';
            return view('backend.index' ,compact('title' , 'subtitle'));})->name('admin');
//Admin page route
    Route::resource('/add' , AdminController::class);
    Route::post('/admin/edit-password/{id}' , [AdminController::class, 'editPasswordSave'])->name('admin.edit-password');

//    Client page route
    Route::resource('/client' , ClientController::class);

//    Sup kategoriyalar
    Route::resource('/sup-category' , SupController::class);
// Zakasni yetkazish
    Route::resource('/delivery' , DeliveryController::class);

//    Yetkazilgan zakaslar
    Route::controller(DeliveredController::class)->group(function(){
        Route::get('/delivered' , 'index')->name('delivered.index');
        Route::post('/filtr' , 'filtr')->name('filtr');
    });
//    Brend page route
    Route::resource('/brend' , BrendController::class);
    Route::resource('/category' , CategoryController  ::class);
//    Product page route
    Route::resource('/product' , ProductController  ::class);
//Supplier Page route
    Route::resource('/supplier' , SupplierController::class);
//Product income page route

    Route::get('/my-profile' , [MyProfileController::class,'index'])->name('my-profile');
    Route::put('/my-profile/{id}' , [MyProfileController::class,'update'])->name('my-profile-update');


    Route::controller(OrderController::class)->group(function(){
        Route::get('/order' , 'index')->name('order.index');
        Route::get('/order/{id}' , 'orderItem')->name('order-item');
    });

    Route::resource('/salary' , SalaryController::class);

//    Route banner
    Route::controller(BannerController::class)->group(function(){
       Route::get('/banner' , 'index')->name('banner.index');
       Route::post('/banner' , 'store')->name('banner.store');
       Route::put('/banner/{id}' , 'update')->name('banner.update');
    });

//    Route contact
    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact' , 'index')->name('contact.index');
        Route::post('/contact' , 'store')->name('contact.store');
        Route::put('/contact/{id}' , 'update')->name('contact.update');
    });


//    Route Faq
    Route::controller(\App\Http\Controllers\Backend\FaqController::class)->group(function(){
        Route::get('/faq' , 'index')->name('faq.index');
        Route::post('/faq' , 'store')->name('faq.store');
        Route::put('/faq/{id}' , 'update')->name('faq.update');
    });

//    Route about
    Route::controller(\App\Http\Controllers\Backend\AboutController::class)->group(function(){
        Route::get('/about' , 'index')->name('about.index');
        Route::post('/about' , 'store')->name('about.store');
        Route::put('/about/{id}' , 'update')->name('about.update');
    });

//    Routee Game
    Route::controller(\App\Http\Controllers\Game\GameController::class)->group(function(){
        Route::get('/game' , 'index')->name('game.index');
    });

    Route::controller(\App\Http\Controllers\Backend\DeliveryPriceControlller::class)->group(function(){
        Route::get('/delivery-price' , 'index')->name('delivery-price.index');
        Route::post('/delivery-price' , 'store')->name('delivery-price.store');
        Route::put('/delivery-price/{id}' , 'update')->name('delivery-price.update');
    });

    Route::controller(\App\Http\Controllers\Api\CommentController::class)->group(function(){
        Route::get('/comment' , 'index')->name('comment.index');
    });

});



Route::middleware('admin')->group(function () {
    Route::controller(KuryerController::class)->group(function(){
        Route::get('/kuryer' , 'index')->name('kuryer.index');
        Route::get('/kuryer/yetkazilganlar' , 'myZakas')->name('kuryer.zakas');
    });
});





Route::get('/auth/google', [UserController::class , 'googleAuth'])->name('auth.google');
Route::get('/auth/google/callback', [UserController::class , 'handleGoogleCallback'])->name('auth.google.callback');





//Error 404 page
Route::get('/error404' , function(){return view('error.error404');})->name('error404');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
