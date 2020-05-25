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
/*

Route::get('/home', 'HomeController@index')->name('home');

// COVIDSTAT
Route::resource('covidstats', 'Controllers\CovidstatController');

// COVIDCONFINEMENT
Route::resource('covidconfinements', 'Controllers\CovidconfinementController');

// LOCALITE
Route::resource('localites', 'Controllers\LocaliteController');

// CATEGORIE
Route::resource('categories', 'Controllers\CategorieController');

// ARTICLE
Route::resource('articles', 'Controllers\ArticleController');

// GROUPE
Route::resource('groupes', 'Controllers\GroupeController');

// SAVE DATA VILLE GEOM
Route::get('/data/ville', 'Controllers\CovidstatController@saveville')->name('save.ville');

// SAVE DATA VILLE GEOM
Route::get('/ville/data', 'Controllers\CovidstatController@villesave')->name('ville.save');

// DATA VILLE JSON
Route::get('/ville/json', 'Controllers\CovidstatController@getjson')->name('ville.json');
Route::get('/lus', 'Controllers\CovidstatController@getLastUpdateStat')->name('lus');

// Export homme
Route::get('/exports/homme', 'Controllers\CovidstatController@exportHomme')->name('homme');
// Export to csv
Route::get('/exports/femme', 'Controllers\CovidstatController@exportFemme')->name('femme');


// HOME
Route::get('/', [
	'as' => 'frontend.home',
	'uses' => 'Controllers\FrontendController@home'
]);

//Statistitque
Route::get('/statistiques', [
	'as' => 'frontend.statistique',
	'uses' => 'Controllers\FrontendController@statistiques'
]);

// READ ARTICLE PAGE
Route::get('/article/{alias}', [
	'as' => 'article.read',
	'uses' => 'Controllers\FrontendController@articleread'
]);

// DELETE ITEM
Route::get('/delete/item', 'Controllers\ArticleController@delete')->name('delete.item');

// SINGLE SUP ARTICLE
Route::get('/delete/article', [
	'as' => 'delete.article',
	'uses' => 'Controllers\ArticleController@delete'
]);

///statsparlocalitecasconfirmes
Route::get('/statsparlocalitecasconfirmes', [
	'as' => 'stat.localitecasconfirmes',
	'uses' => 'Controllers\FrontendController@statsparlocalitecasconfirmes'
]);

///actualite
Route::get('/actualites', [
	'as' => 'actualites',
	'uses' => 'Controllers\FrontendController@actualites'
]);

///corus
Route::get('/corus', [
	'as' => 'corus',
	'uses' => 'Controllers\FrontendController@corus'
]);

///contact
Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'Controllers\FrontendController@contact'
]);

//telechargement
Route::get('/telechargement', [
	'as' => 'telechargement',
	'uses' => 'Controllers\FrontendController@telechargement'
]);

//covid19
Route::get('/covid19', [
	'as' => 'covid19',
	'uses' => 'Controllers\FrontendController@covid19'
]);*/

Route::middleware('cors')->group(function () {

    Route::resource('hotels', 'HotelController');
    Route::get('/search/hotels/{keyWord}', 'HotelController@search');
    Route::get('/default/hotels', 'HotelController@getDefaultList');
});

