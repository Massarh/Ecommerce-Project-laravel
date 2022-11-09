<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

// FrontProductListController
Route::get('/', [FrontProductListController::class, 'index']);
Route::get('/product/{id}', [FrontProductListController::class, 'show'])->name('product.view');// change 'product.show' to 'product.view' because We used "product.show" in the product folder
Route::get('/category/{name}', [FrontProductListController::class, 'allproduct'])->name('product.list');

// CartController
Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/products/{product}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/product/{product}', [CartController::class, 'removeCart'])->name('cart.remove');
    //payment 
Route::get('/checkout/{amount}', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth'); // must login
Route::post('/charge', [CartController::class, 'charge'])->name('cart.charge'); 
Route::get('/orders', [CartController::class, 'order'])->name('order')->middleware('auth');  
// END CartController

// UserController
Route::get('/users', [UserController::class, 'index'])->name('user.index');


/** Auth */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/** Auth */

Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('product', ProductController::class); 

});

// 
Route::get('subcategories/{id}', [ProductController::class, 'loadSubCategories']);



// Route::get('/index/test',[CategoryController::class, 'store']);