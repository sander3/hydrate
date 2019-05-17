<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication Routes
Route::post('register', 'Auth\RegisterController@register')->name('auth.register')->middleware('guest');

Route::post('email', 'Auth\LinkController@sendMagicLinkEmail')->name('auth.email')->middleware(['guest', 'throttle:5,5']);

Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout')->middleware('auth');

// Application Routes
Route::post('venues/geolocation', 'VenueController@searchByGeolocation')->name('venues.geolocation');

Route::apiResources([
    'venues'            => 'VenueController',
    'venue.categories'  => 'CategoryController',
    'category.products' => 'ProductController',
]);

Route::post('venue/{venue}/orders', 'OrderController@store')->name('venue.orders.store');

Route::post('order/{order}/payments', 'PaymentController@store')->name('order.payments.store')->middleware('signed');

Route::get('payments/{payment}', 'PaymentController@show')->name('payments.show')->middleware('signed');
Route::post('payments/{payment}', 'PaymentController@update')->name('payments.update')->middleware('signed');
