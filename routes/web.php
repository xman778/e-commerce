<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
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

// Route::get('/', function () {
//     return view('home-page');
// });
route::get('/',[Controller::class,'home'])->name('home');

route::get('/redierct',[Controller::class,'redierct'])->middleware('verified')->name('homeland');


// ------amdin routes--------------//
// category--------routes-----------------------
route::get('/admin-category',[AdminController::class,'categoryindex'])->name('admin.category');

route::post('/category',[AdminController::class,'category'])->name('add.category');

route::get('/categorydeleting/{id}',[AdminController::class,'catdeleting'])->name('delete.category');

// -----product-------routes-------------

route::get('/product',[AdminController::class,'showproduct'])->name('show.product');
route::post('/addproduct',[AdminController::class,'addproduct'])->name('add.product');
route::get('/products',[AdminController::class,'products'])->name('products');
route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct'])->name('deleteproduct');


//------add------to cart--------------

Route::post('/addtocart/{id}',[Controller::class,'addtocart'])->name('add_to_cart');
Route::get('/show_cart',[Controller::class,'showcart'])->name('show_cart');
Route::get('/deletecartproduct/{id}',[Controller::class,'deletecartproduct'])->name('deletecartproduct');



// ============payment=======route-------------

Route::get('/cashdelivery',[Controller::class,'cashdelivery'])->name('cash.delivery');

Route::get('/stripe/{totalprice}',[Controller::class,'stripe'])->name('stripe');
Route::post('/stripe/{totalprice}',[Controller::class,'stripepost'])->name('stripe.post');



//=========================admin-----------orders\

route::get('/admin_order',[AdminController::class,'orders'])->name('admin.orders');
route::get('/order_deleted/{id}',[AdminController::class,'deleteorders'])->name('delete.order');
route::get('/orderdeleted/{id}',[AdminController::class,'deleteorder'])->name('deleteorder');


Route::get('/generate-pdf/{id}', [Controller::class, 'generatePDF'])->name('pdf');







Route::get('/sendmail/{id}', [AdminController::class,'sendmail'])->name('sendmail');


Route::get('/adminbody', [AdminController::class,'adminbody'])->name('admin.body');





Route::get('/ordershow', [AdminController::class,'ordershow'])->name('ordershow');











Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
