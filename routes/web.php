<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('/add' , \App\Http\Controllers\Backend\AdminController::class);
    Route::post('/admin/edit-password/{id}' , [\App\Http\Controllers\Backend\AdminController::class, 'editPasswordSave'])->name('admin.edit-password');

//    Client page route
    Route::resource('/client' , \App\Http\Controllers\Backend\ClientController::class);

//    Brend page route
    Route::resource('/brend' , \App\Http\Controllers\Backend\BrendController::class);
    Route::resource('/category' , \App\Http\Controllers\Backend\CategoryController  ::class);
//    Product page route
    Route::resource('/product' , \App\Http\Controllers\Backend\ProductController  ::class);
//Supplier Page route
    Route::resource('/supplier' , \App\Http\Controllers\Backend\SupplierController::class);
//Product income page route
    Route::resource('/product-income' , \App\Http\Controllers\Backend\ProductIncomeController::class);
});




//Mobil dasturchi uchun routelar

Route::resource('/klient' , UserController::class);


//Mobil dasturchi uchun routelar









//Error 404 page
Route::get('/error404' , function(){return view('error.error404');})->name('error404');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
