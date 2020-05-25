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

// Route::get('/admin', function () {
//     return view('auth/login');
// });

//Auth::routes();


Route::middleware('cors')->group(function () {

    Route::resource('hotels', 'HotelController');
    Route::get('/search/hotels/{keyWord}', 'HotelController@search');
    Route::get('/default/hotels', 'HotelController@getDefaultList');
});

