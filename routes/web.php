<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConditionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
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
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/seller/{seller}', [HomeController::class, 'seller'])->name('seller');
Route::prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('condition', ConditionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-image', ProductImageController::class);
    Route::get('datatable/user', [AdminUserController::class, 'datatable'])->name('user.table');
    Route::get('datatable/category', [CategoryController::class, 'datatable'])->name('category.table');
    Route::get('datatable/condition', [ConditionController::class, 'datatable'])->name('condition.table');
    Route::get('datatable/product', [ProductController::class, 'datatable'])->name('product.table');
});
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.store');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart/table', [CartController::class, 'cart'])->name('cart.table');
    Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/product/comment', [HomeController::class, 'comment'])->name('product.comment');
    Route::post('/product/like', [HomeController::class, 'like'])->name('product.like');
    Route::get('/product/detail', [HomeController::class, 'productDetail'])->name('productDetail');
    Route::get('/user/product', [UserController::class, 'showProduct'])->name('user.product');
    Route::get('/user/product/create', [UserController::class, 'addProduct'])->name('user.product.create');
    Route::post('/user/product/image', [UserController::class, 'storeImage'])->name('user.product.image');
    Route::get('/user/product/image/{ulid}', [UserController::class, 'deleteImage'])->name('user.product.image.delete');
    Route::post('/user/product', [UserController::class, 'storeProduct'])->name('user.product');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/update', [UserController::class, 'update'])->name('update.user');
    Route::get('/user/order', [UserController::class, 'order'])->name('order.user');
});
Route::get('/test', function () {
    $data['users'] = User::all();
    return view('home', $data);
});
Route::get('/chat/user/{user}', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::get('/chat/room/{room}', [App\Http\Controllers\ChatController::class, 'room'])->name('chat.room');
Route::get('/chat/get/{room}', [App\Http\Controllers\ChatController::class, 'getChat'])->name('chat.get');
Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendChat'])->name('chat.send');
Route::get('rajaongkir', [CheckoutController::class, 'rajaongkir'])->name('rajaongkir');
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
