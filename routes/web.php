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
// Route::get('/show-cart','Shop\CartController@show_cart')->name('show-cart');
Route::get('/view-wishlist','Shop\CartController@viewWishlist')->name('view-wishlist');
Route::get('/add-wishlist','Shop\CartController@addWishlist')->name('add-wishlist');
Route::get('/delete-wishlist', 'Shop\CartController@deleteWishlist')->name('delete-wishlist');

Route::resource('profile', 'Shop\Profile\ProfileController');
Route::get('/change-cart-quantity', 'Shop\CartController@changeCartQuantity')->name('change-cart-quantity');
Route::get('/checkout','Shop\CartController@checkout')->name('checkout');
Route::get('/aboutus','Shop\AboutUsController@index')->name('aboutus');
Route::get('/login','Shop\CustomerController@login')->name('login');
Route::post('/customer/process-login','Shop\CustomerController@processLogin')->name('customer.process-login');
Route::get('/customer/process-logout','Shop\CustomerController@processLogout')->name('customer.process-logout');
Route::get('/register','Shop\CustomerController@register')->name('register');
Route::get('/customer/{id1}/edit-pass','Shop\CustomerController@editPass')->name('customer.edit-pass');
Route::put('/customer/{id1}','Shop\CustomerController@updatePass')->name('customer.update-pass');
Route::get('/customer/{id2}/edit-profile','Shop\CustomerController@editProfile')->name('customer.edit-profile');
Route::put('/customer/{id2}','Shop\CustomerController@updateProfile')->name('customer.update-profile');
// Route::patch('/customer/{customer}','Shop\CustomerController@updatePass')->name('customer.update-pass');
Route::get('/check-email','Shop\CustomerController@checkEmail')->name('check-email');
Route::post('/product-comment','Shop\ProductDetailController@comment')->name('product-comment');
Route::resource('customer/profile','Shop\Profile\ProfileController');
route::resource('customer', 'Shop\CustomerController');
route::resource('contact', 'Shop\ContactController');
Route::post('/quick-view','Shop\QuickViewController@quickview')->name('quick-view');
Route::get('/shop/product/{id}','Shop\ProductDetailController@index')->name('product-detail');
Route::get('/shop/search-product','Shop\HomeController@searchproduct')->name('search-product');
Route::post('/comment','Shop\ProductDetailController@comment')->name('comment');
 
//////////////////////////////////////
Route::post('chosen-payment','Shop\PaymentController@chosenPayment')->name('chosen-payment');
Route::get('save-order','Shop\PaymentController@saveOrder')->name('save-order');
Route::get('/paypal-checkout','PayPalTestController@index')->name('paypal-checkout');
Route::get('/paypal/status','PayPalTestController@status');
// Route::get('/pay/list','PayPalTestController@paymentList');
// Route::get('/pay/{id}/details','PayPalTestController @paymentDetail');

//===========ROUTE ON ADMIN PAGE==============
// Route::get('/admin','Admin\AdminController@dashboard')->middleware('adminLogin')->name('admin.dashboard');
Route::get('/admin','Admin\AdminController@index');
Route::get('/admin','Admin\AdminController@processLogout')->name('admin.logout');;
Route::get('/admin/login','Admin\AdminController@login')->name('admin.login');
Route::post('/admin/process-login','Admin\AdminController@processLogin')->name('admin.process-login');
Route::get('/admin/check-email-login','Admin\AdminController@checkEmailLogin')->name('admin.check-email-login');
Route::get('/admin/selling-information','Admin\AdminController@sellInfor')->name('sell-info');

// Route::get('/admin/check-email','Admin\AccountController@checkEmail')->name('admin.check-email');
// Route::get('/admin/check-email-customer','Admin\CustomerController@checkEmail')->name('admin.check-email-customer');

// Route::get('/admin/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin','as'=>'admin.'],function(){
    Route::get('dashboard','Admin\AdminController@dashboard')->name('dashboard');
    Route::resource('account', 'Admin\AccountController');
    Route::resource('profile/password','Admin\Profile\PasswordController');
    // Route::get('/account/{id}/edit-pass','Admin\AccountController@editPass')->name('account.edit-pass');
    // Route::put('/account/{id}','Admin\AccountController@updatePass')->name('account.update-pass');
    Route::resource('customer', 'Admin\CustomerController');
    Route::resource('product', 'Admin\ProductController');

    Route::resource('order', 'Admin\OrderController');
    // Route::resource('orderdetail', 'Admin\OrderDetailController');

    Route::resource('brand','Admin\BrandController');

    Route::resource('contact','Admin\ContactController');
});
Route::get('/product/upload-gallrery/{id}','Admin\ProductController@uploadGallery')->name('upload-gallery');
Route::post('/product/process-upload-gallrery/{id}','Admin\ProductController@processuploadGallery')->name('process-upload-gallery');

////////////////////////////////////////////



