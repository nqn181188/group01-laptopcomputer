<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
//=========ROUTE ON SHOP PAGE========
Route::get('/','Shop\HomeController@index')->name('home');
Route::get('/shop','Shop\ShopController@index')->name('shop');
Route::get('/login','Shop\HomeController@login')->name('login');
Route::get('/register','Shop\HomeController@register')->name('register');



//////////////////////////////////////


//===========ROUTE ON ADMIN PAGE==============
// Route::get('/admin','Admin\AdminController@dashboard')->middleware('adminLogin')->name('admin.dashboard');
Route::get('/admin','Admin\AdminController@index');
Route::get('/admin','Admin\AdminController@processLogout')->name('admin.logout');;
Route::get('/admin/login','Admin\AdminController@login')->name('admin.login');
Route::post('/admin/process-login','Admin\AdminController@processLogin')->name('admin.process-login');

// Route::get('/admin/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin','as'=>'admin.'],function(){
    Route::get('dashboard','Admin\AdminController@dashboard')->name('dashboard');
    Route::resource('account', 'Admin\AccountController');
    Route::resource('customer', 'Admin\CustomerController');
    Route::resource('product', 'Admin\ProductController');
});

////////////////////////////////////////////



