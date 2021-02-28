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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Front\HomeController@index')->name('/');

Auth::routes();

Route::post('/new-bus-booking', 'Front\HomeController@newBooking')->name('new-bus-booking');


//Admin
Route::get('/home', 'Admin\HomeController@index')->name('home');

//Location
Route::get('/add-location', 'Admin\HomeController@addLocation')->name('add-location');

Route::post('/new-location', 'Admin\HomeController@newLocation')->name('new-location');

Route::get('/manage-location', 'Admin\HomeController@manageLocation')->name('manage-location');

Route::get('/edit-location/{id}','Admin\HomeController@editLocation')->name('edit-location');

Route::post('/update-location','Admin\HomeController@updateLocation')->name('update-location');

Route::post('/delete-location','Admin\HomeController@deleteLocation')->name('delete-location');

//Bus Fare
Route::get('/add-cost', 'Admin\BusFareController@addCost')->name('add-cost');

Route::post('/new-cost', 'Admin\BusFareController@newCost')->name('new-cost');

Route::get('/manage-cost', 'Admin\BusFareController@manageCost')->name('manage-cost');

Route::get('/edit-cost/{id}','Admin\BusFareController@editCost')->name('edit-cost');

Route::post('/update-cost','Admin\BusFareController@updateCost')->name('update-cost');

Route::post('/delete-cost','Admin\BusFareController@deleteCost')->name('delete-cost');

//Bus Booking


Route::get('/manage-bus-booking', 'Admin\BusBookingController@manageBooking')->name('manage-bus-booking');

