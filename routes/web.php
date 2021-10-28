<?php

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

Route::get('/', 'HomeController@index')->name('home')->middleware('home');;
Route::any('/search', 'ProductController@search')->name('search');

Route::get('/register/customer', function () {

    return view('auth.registercustomer');

})->name('cus_reg');
Route::get('/register/shop', function () {

    return view('auth.registershop');

})->name('shp_reg');
Route::get('/register/deliveryman', function () {

    return view('auth.registerdelivery');

})->name('deli_reg');
Route::resource('customer', 'CustomerController');
Route::resource('shopowner', 'ShopOwnerController');
Route::get('/shopowner/products/create', 'ShopOwnerController@productcreate')->name('shopowner.pcreate')->middleware('shopowner');
Route::post('/shopowner/products/', 'ShopOwnerController@productstore')->name('shopowner.pstore')->middleware('shopowner');
Route::get('/shopowner/products/{product}/edit', 'ShopOwnerController@productedit')->name('shopowner.pedit')->middleware('shopowner');
Route::put('/shopowner/products/{product}', 'ShopOwnerController@productupdate')->name('shopowner.pupdate')->middleware('shopowner');
Route::get('/shopowner/products/{product}', 'ShopOwnerController@productdestroy')->name('shopowner.pdestroy')->middleware('shopowner');

Route::resource('product', 'ProductController');
Route::resource('deliveryman', 'DeliveryManController');
Route::get('/deliveryman/show_order/{order}', 'DeliveryManController@show_order')->name('deliveryman.show_order');
Route::post('/deliveryman/deliver', 'DeliveryManController@deliver')->name('deliveryman.deliver');


Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/customers', 'AdminController@customers')->name('admin.customers');
Route::get('/admin/products', 'AdminController@products')->name('admin.products');
Route::get('/admin/shopowners','AdminController@shopowners')->name('admin.shopowners');
Route::get('/admin/deliverymen','AdminController@deliverymen')->name('admin.deliverymen');

Route::post('/orders/details', 'OrderController@details')->name('order.details');
Route::get('/orders/waiting/{order_id}/{total}', function ($order_id,$total) {

    return view('order.waiting',['order_id'=>$order_id,'total'=>$total]);

})->name('order.pending');
Route::get('/orders/pastorders','OrderController@pastOrders')->name('order.past_orders');
Route::resource('orders', 'OrderController');

Route::resource('cart', 'CartController');
Route::get('/checkout','OrderController@store')->name('order.store');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cartempty','CartController@empty')->name('cart.empty');

// Route::get('/admin/doctors','AdminController@doctors')->name('admin.doctors')->middleware('isAdmin');
Route::post('token', 'PaymentController@token')->name('token');
//Route::get('blah', 'PaymentController@_bkash_Get_Token')->name('dsd');
Route::get('createpayment', 'PaymentController@createpayment')->name('createpayment');
Route::get('executepayment', 'PaymentController@executepayment')->name('executepayment');

// Route::post('/admin/appointments', 'AppointmentController@approve')->name('appointment.approve')->middleware('isAdmin');
Auth::routes();
Route::get('/login', function () {

    return view('auth.login');

})->name('login');

