<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;
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
Route::get('/user/product', [UserController::class, 'showProduct'])->name('user.product');
Route::post('/user/product', [UserController::class, 'storeProduct'])->name('user.product');
Route::prefix('admin')->group(function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('condition', ConditionController::class);
    Route::resource('product', ProductController::class);
    Route::get('datatable/user',[AdminUserController::class, 'datatable'])->name('user.table');
    Route::get('datatable/category',[CategoryController::class, 'datatable'])->name('category.table');
    Route::get('datatable/condition',[ConditionController::class, 'datatable'])->name('condition.table');
    Route::get('datatable/product',[ProductController::class, 'datatable'])->name('product.table');
});
Route::middleware('auth')->group(function(){
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::get('/cart/table',[CartController::class,'cart'])->name('cart.table');
    Route::get('/cart/delete',[CartController::class,'delete'])->name('cart.delete');
});
Route::get('/test',function(){
    $data['users'] = User::all();
    return view('home',$data);
});
Route::get('/chat/user/{user}', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::get('/chat/room/{room}', [App\Http\Controllers\ChatController::class, 'room'])->name('chat.room');
Route::get('/chat/get/{room}', [App\Http\Controllers\ChatController::class, 'getChat'])->name('chat.get');
Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendChat'])->name('chat.send');
