<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestController;
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

/** Auth */
Auth::routes();

Route::middleware(['revalidate'])->group(function () {

    // HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //  home page

    Route::get('/no-items', function () {
        return view('no-item');
    })->name('noItems');

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
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth'); // must login
    Route::post('/charge', [CartController::class, 'charge'])->name('cart.charge');

    // OrderController
    Route::get('/orders', [OrderController::class, 'order'])->name('order')->middleware('auth');
    Route::get('/order-items/{orderId}', [OrderController::class, 'orderItems'])->name('orderItems')->middleware('auth');

    // UserController
    Route::get('profile', [UserController::class, 'showUserProfile'])->name('profile')->middleware('auth');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
    Route::put('profile/update', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

    // ProductController
    // using in ajax in all products page
    Route::get('sections', [ProductController::class, 'loadSubCategories']);

    //  TestController 
    Route::get('/test', [TestController::class, 'test']);

    // end home page

    // middleware any action that executed between the request and the response.
    // auth inside middleware => check that the user should be login otherwise he will be redirected to login form.
    // isAdmin inside middleware => check that the user who is login is not a customer otherwise he will be redirected to home page.

    //  Admin Panel 
    Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {

        Route::get('/dashboard', function () {
            return view('admin.layouts.container');
        })->name('dashboard');

        // CategoryController
        Route::resource('store', CategoryController::class);

        // SubcategoryController
        Route::get('section/store/{slug}', [SubcategoryController::class, 'getSubcategoryByCatId'])->name('section.getSubcategoryByCatId');
        Route::resource('section', SubcategoryController::class);

        // ProductController
        Route::get('product/store/{storeSlug}/section/{sectionSlug}', [ProductController::class, 'getProductByCatAndSubId'])->name('product.getProductByCatAndSubId');
        Route::resource('product', ProductController::class);
        Route::get('product/section/{sectionSlug}', [ProductController::class, 'getProductBySubId'])->name('product.getProductBySubId');

        // OrderController 
        Route::get('/orders', [OrderController::class, 'userOrder'])->name('order.index');
        Route::get('/store-order', [OrderController::class, 'storeOrder'])->name('order.store');
        Route::get('/orders/{orderid}', [OrderController::class, 'viewUserOrder'])->name('user.order');
        Route::get('/store-order-item/{categorySlug}', [OrderController::class, 'viewStoreItem'])->name('item.order');

        // SliderController 
        Route::resource('slider', SliderController::class);


        // UserController
        Route::get('/add-admin', [UserController::class, 'viewCreateAdminOrEmployee'])->name('add.admin');
        Route::post('/create-admin-or-employee', [UserController::class, 'createAdminOrEmployee'])->name('admin.create');
        Route::get('/view-store', [UserController::class, 'viewStore'])->name('store.view');
        Route::get('/view-new-admin', [UserController::class, 'viewNewAdmin'])->name('newAdmin.view');
        Route::get('/view-admin-and-employee/{categoryId}', [UserController::class, 'viewAdminAndEmployee'])->name('admin.view');
        Route::delete('/delete-admin-and-employee/{userId}', [UserController::class, 'deleteAdminOrEmployee'])->name('admin.delete');
    });
});
