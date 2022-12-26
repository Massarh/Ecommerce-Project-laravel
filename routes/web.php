<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
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
Route::get('/product/{productId}', [FrontProductListController::class, 'show'])->name('product.view'); // change 'product.show' to 'product.view' because We used "product.show" in the product folder
Route::get('/store/{slug}', [FrontProductListController::class, 'allproduct'])->name('product.list');
// to search product
Route::get('/all/products', [FrontProductListController::class, 'moreProducts'])->name('more.product');

// CartController
Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/products/{product}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/product/{product}', [CartController::class, 'removeCart'])->name('cart.remove');
//payment 
Route::get('/checkout/{amount}', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth'); // must login
Route::post('/charge', [CartController::class, 'charge'])->name('cart.charge');

// Order
Route::get('/orders', [CartController::class, 'order'])->name('order')->middleware('auth');
Route::get('/order-items/{orderId}', [CartController::class, 'orderItems'])->name('orderItems')->middleware('auth');

// END CartController

//CategoryController
Route::get('/users-stores', [CategoryController::class, 'categoriesWithUser'])->name('getCategoriesWithUser');


Route::get('/no-items', function () {
    return view('no-item');
})->name('noItems');

/** Auth */
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// middleware any action that executed between the request and the response.
// auth inside middleware => check that the user should be login otherwise he will be redirected to login form.
// isAdmin inside middleware => check that the user who is login is not a customer otherwise he will be redirected to home page.

/** Admin Panel */
Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('store', CategoryController::class);
    // subcategory
    Route::get('section/store/{slug}', [SubcategoryController::class, 'getSubcategoryByCatId'])->name('section.getSubcategoryByCatId');
    Route::resource('section', SubcategoryController::class);

    // product
    Route::get('product/store/{storeSlug}/section/{sectionSlug}', [ProductController::class, 'getProductByCatAndSubId'])->name('product.getProductByCatAndSubId');
    Route::resource('product', ProductController::class);

    Route::get('/orders', [CartController::class, 'userOrder'])->name('order.index');
    /*  ORDER */
    Route::get('/store-order', [CartController::class, 'storeOrder'])->name('order.store');
    Route::get('/orders/{orderid}', [CartController::class, 'viewUserOrder'])->name('user.order');  // {id} is user id
    Route::get('/store-order-item/{categorySlug}', [CartController::class, 'viewStoreItem'])->name('item.order');
    // Slider Admin
    Route::resource('slider', SliderController::class);


    /* Add Admin/Employee */
    Route::post('/create-admin-or-employee', [UserController::class, 'createAdminOrEmployee'])->name('admin.create');
    Route::get('/add-admin', function () {
        return view('admin.admin-and-employee.add-admin');
    })->name('add.admin');
    Route::get('/view-store', [UserController::class, 'viewStore'])->name('store.view');
    Route::get('/view-new-admin', [UserController::class, 'viewNewAdmin'])->name('newAdmin.view');
    Route::get('/view-admin-or-employee/{categoryId}', [UserController::class, 'viewAdminAndEmployee'])->name('admin.view');
    Route::delete('/delete-admin-or-employee/{userId}', [UserController::class, 'deleteAdminOrEmployee'])->name('admin.delete');
});

// using in ajax in all products page
Route::get('sections', [ProductController::class, 'loadSubCategories']);

/*  PROFILE ADMIN */
Route::get('profile', [UserController::class, 'showUserProfile'])->name('profile');
Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('profile/update', [UserController::class, 'updateProfile'])->name('profile.update');



/*  TEST */
Route::get('/index/test', [ProductController::class, 'test']);
