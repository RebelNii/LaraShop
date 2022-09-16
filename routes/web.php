<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/', [ProductsController::class, 'index']);


//ProductsController
Route::get('/show/{product}',[ProductsController::class, 'show']);



//Cart section
Route::post('/cart/{product}',[CartController::class, 'cart']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');

Route::put('/cart/update/{cart}', [CartController::class, 'update']);

Route::delete('/cart/delete/{cart}', [CartController::class, 'destroy']);

Route::get('/cashout', [CartController::class, 'pay']);

Route::get('/paystackss', [CartController::class, 'paystack']);

//checkout controller
Route::post('/stripe',[CheckOutController::class, 'index']);

Route::post('/testone',[TestsController::class, 'index']);

Route::post('/pay',[CheckOutController::class, 'makePayment']);

Route::get('/pay/callback',[CheckOutController::class, 'callback'])->name('callback');

//wishlist controller
Route::get('/wishlist',[WishlistController::class, 'index']);

Route::post('/wishlist/{wish}',[WishlistController::class, 'store']);


//Users Section
Route::get('/login', [UsersController::class, 'index'])->name('login');

Route::get('/logout', [UsersController::class, 'logout']);

Route::get('/redirect', [UsersController::class, 'redirect']);

Route::post('/register', [UsersController::class, 'register']);

Route::post('/store', [UsersController::class, 'store']);

Route::get('/profile', [UsersController::class, 'profile'])->middleware('auth');

Route::get('/profile/orders', [UsersController::class, 'order'])->middleware('auth');

Route::get('/profile/account', [UsersController::class, 'account'])->middleware('auth');

Route::get('/profile/password', [UsersController::class, 'passwordReset'])->middleware('auth');

Route::put('/profile/update', [UsersController::class, 'resetPassword'])->middleware('auth');

Route::get('/forgotpass', [UsersController::class, 'forgotRedirect']);

Route::post('/resetpassword',[UsersController::class, 'forgotPassword']);

Route::get('/mailreset', [UsersController::class, 'mailReset']);

Route::put('/mailupdate',[UsersController::class, 'mailUpdate']);

//Admin rights */
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth','admins');

//get list of products
Route::get('/admin/products',[AdminController::class, 'products'])->middleware('admins');

//redirect to add product form
Route::get('/admin/add', [AdminController::class, 'add'])->middleware('admins');
//route to add product into db
Route::post('/admin/addproduct',[AdminController::class, 'store'])->middleware('admins');
//route to get list of customers
Route::get('/admin/users',[AdminController::class, 'users']);
