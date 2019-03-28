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

Route::get('/',  'HotelController@index')->name('home');
Route::post('/search' ,'HotelController@search')->name('search');
Auth::routes();
Route::resource('booking', 'BookingController');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
