<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/** Admin */
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard/products', 'HomeController@products')->name('dashboard.products');
    Route::get('/dashboard/providers', 'HomeController@providers')->name('dashboard.providers');
    Route::get('/dashboard/orders', 'HomeController@orders')->name('dashboard.orders');

    /** Users */
    Route::resource('users', 'UserController');
    Route::post('activate-user/{id}', 'ActivateUser');
    Route::post('reset-password/{id}', 'ResetPassword');

    /** Providers */
    Route::resource('providers', 'ProviderController');
    Route::resource('providers.products', 'ProductController')->shallow();
    Route::resource('providers.sections', 'SectionController')->shallow();
    Route::post('activate-product/{id}', 'ActivateProduct');
    Route::post('change-product-status/{id}', 'ChangeProductStatus');
    Route::post('delete-product-image/{productImage}', 'ProductController@deleteProductImage');

    /** Orders */
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/{order}/order-items', 'OrderController@orderItems')->name('orders.order-items');
    Route::get('orders/{order}/invoice', 'OrderInvoice')->name('orders.invoice');

    Route::get('list-products', 'ProductController@listAll')->name('list-products');

    Route::resource('promos', 'PromoController');
    Route::post('activate-promo/{id}', 'ActivatePromo');
    Route::resource('vouchers', 'VoucherController');
    Route::resource('categories', 'CategoryController');
    Route::resource('nations', 'NationController');
    Route::get('nations/{nationId}/cities', 'NationController@cities');
    Route::resource('promos', 'PromoController');
    Route::resource('packages', 'PackageController');
    Route::resource('advertising-types', 'AdvertisingTypeController');
    Route::resource('advertisings', 'AdvertisingController');
});

/** Provider */
Route::group(['prefix' => 'provider', 'as' => 'provider.', 'namespace' => 'Providers', 'middleware' => ['auth', 'provider']], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('orders', 'OrderController');
    Route::resource('products', 'ProductController');
    Route::post('delete-product-image/{productImage}', 'ProductController@deleteProductImage');
    Route::post('activate-product/{id}', 'ActivateProduct');
    Route::resource('products.product-exceptions', 'ProductExceptionController')->shallow();
    Route::resource('sections', 'SectionController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('order-items', 'OrderItemController')->only(['index', 'edit']);
    Route::post('orders/{orderItem}/in-waiting', 'OrderStatusController@inWaiting');
    Route::post('orders/{orderItem}/accept', 'OrderStatusController@accept');
    Route::post('orders/{orderItem}/refuse', 'OrderStatusController@refuse');
    Route::post('orders/{orderItem}/prepare', 'OrderStatusController@prepare');
    Route::post('orders/{orderItem}/ready-for-delivery', 'OrderStatusController@readyForDelivery');
    Route::post('orders/{orderItem}/complete', 'OrderStatusController@complete');
    Route::get('order-trackings/{orderItem}', 'OrderTracking');

    Route::get('logs/{type}/{itemId}', 'LoggerController');

    Route::post('upload', 'ImageController@upload');
    Route::post('base64-upload', 'ImageController@base64Upload');
});

use Maatwebsite\Excel\Facades\Excel;

Route::get('export', function () {
    return Excel::download(new \App\Exports\OrdersExport, 'orders.xlsx');
});