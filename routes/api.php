<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->group(function () {
    Route::resource('hotels', 'HotelController');
    Route::resource('exercices', 'ExerciceController');

    Route::resource('entites', 'EntiteController');
    Route::get('/search/entites/{keyWord}', 'EntiteController@search');
    Route::get('/default/entites', 'EntiteController@getDefaultList');

    Route::resource('objectifstrategiques', 'ObjectifStrategiqueController');
    Route::get('/search/objectifstrategiques/{keyWord}', 'ObjectifStrategiqueController@search')->name('objectifstrategiques.search');
    Route::get('/default/objectifstrategiques', 'ObjectifStrategiqueController@getDefaultList')->name('objectifstrategiques.default');

    Route::resource('objectifspecifiques', 'ObjectifStrategiqueController');
    Route::get('/search/objectifspecifiques/{keyWord}', 'ObjectifSpecifiqueController@search')->name('objectifspecifiques.search');
    Route::get('/default/objectifspecifiques', 'ObjectifSpecifiqueController@getDefaultList')->name('objectifspecifiques.default');


    Route::resource('activites', 'ActiviteController');
    Route::get('/search/hotels/{keyWord}', 'HotelController@search');
    Route::get('/default/hotels', 'HotelController@getDefaultList');
});
