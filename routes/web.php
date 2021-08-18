<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    // Alert::info('Info Title', 'Info Message');
//     return view('welcome');
// });

Route::get('/clear-cart', 'Shop\CartController@clearSession')->name('clear-cart');
   
//=========ROUTE ON SHOP PAGE========
Route::get('/','Shop\HomeController@index')->name('home');
Route::get('/shop','Shop\ShopController@index')->name('shop');
Route::get('/viewcart','Shop\CartController@index')->name('viewcart');
Route::get('/add-cart','Shop\CartController@addCart')->name('add-cart');
Route::get('/delete-cart-item', 'Shop\CartController@deleteCartItem')->name('delete-cart-item');
Route::get('/change-cart-quantity', 'Shop\CartController@changeCartQuantity')->name('change-cart-quantity');
Route::get('/checkout','Shop\CartController@checkout')->name('checkout');
Route::post('/do-checkout', 'Shop\CartController@doCheckout')->name('do-checkout');
Route::get('/aboutus','Shop\AboutUsController@index')->name('aboutus');
Route::get('/login','Shop\CustomerController@login')->name('login');
Route::post('/customer/process-login','Shop\CustomerController@processLogin')->name('customer.process-login');
Route::get('/customer/process-logout','Shop\CustomerController@processLogout')->name('customer.process-logout');
Route::get('/register','Shop\CustomerController@register')->name('register');
Route::get('/customer/edit-pass','Shop\CustomerController@editPass')->name('customer.edit-pass');
Route::put('/customer/{id}','Shop\CustomerController@updatePass')->name('customer.update-pass');
// Route::patch('/customer/{customer}','Shop\CustomerController@updatePass')->name('customer.update-pass');
Route::get('/check-email','Shop\CustomerController@checkEmail')->name('check-email');
Route::post('/product-comment','Shop\ProductDetailController@comment')->name('product-comment');

route::resource('customer', 'Shop\CustomerController');
route::resource('contact', 'Shop\ContactController');
Route::post('/quick-view','Shop\QuickViewController@quickview')->name('quick-view');
Route::get('/shop/product/{id}','Shop\ProductDetailController@index')->name('product-detail');
Route::get('/shop/search-product','Shop\HomeController@searchproduct')->name('search-product');
Route::post('/comment','Shop\ProductDetailController@comment')->name('comment');
 
//////////////////////////////////////


//===========ROUTE ON ADMIN PAGE==============
// Route::get('/admin','Admin\AdminController@dashboard')->middleware('adminLogin')->name('admin.dashboard');
Route::get('/admin','Admin\AdminController@index');
Route::get('/admin','Admin\AdminController@processLogout')->name('admin.logout');;
Route::get('/admin/login','Admin\AdminController@login')->name('admin.login');
Route::post('/admin/process-login','Admin\AdminController@processLogin')->name('admin.process-login');
Route::get('/admin/check-email-login','Admin\AdminController@checkEmailLogin')->name('admin.check-email-login');
// Route::get('/admin/check-email','Admin\AccountController@checkEmail')->name('admin.check-email');
// Route::get('/admin/check-email-customer','Admin\CustomerController@checkEmail')->name('admin.check-email-customer');

// Route::get('/admin/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin','as'=>'admin.'],function(){
    Route::get('dashboard','Admin\AdminController@dashboard')->name('dashboard');
    Route::resource('account', 'Admin\AccountController');
    Route::resource('customer', 'Admin\CustomerController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('orderdetail', 'Admin\OrderDetailController');
    Route::resource('brand','Admin\BrandController');
    Route::resource('contact','Admin\ContactController');
    Route::resource('gallery','Admin\GalleryController');
    


});

////////////////////////////////////////////



