<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/api/category', [HomeController::class, 'category']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/quickview/{product}', [HomeController::class, 'quickView'])->name('quickview');
Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/product/detail', [HomeController::class, 'productDetail'])->name('productDetail');
Route::prefix('admin')->group(function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('category', CategoryController::class);
    Route::get('datatable/user',[AdminUserController::class, 'datatable'])->name('user.table');
    Route::get('datatable/category',[CategoryController::class, 'datatable'])->name('category.table');
});
Route::middleware('auth')->group(function(){
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
});
