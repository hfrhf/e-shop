<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/',[StoreController::class,'index'])->name('store');
Route::get('/productStore/{product}',[StoreController::class,'show'])->name('store.show');



Route::middleware(['auth','editor'])->group(function () {
Route::resource('product', ProductController::class);
Route::get('/editor/dashboard', [EditorController::class, 'index'])->name('editor_dashboard');

});

Route::middleware(['auth','user'])->group(function () {
    Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('profile', ProfileController::class);
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user_dashboard');


});



Route::middleware(['auth','admin'])->group(function () {
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('profile', ProfileController::class);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');

});





Auth::routes();

