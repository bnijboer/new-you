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

Route::get('/', function () {
	return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {
	Route::get('/profile/{user}', 'ProfileController@show')->name('profile');
	Route::get('/profile/{user}/edit', 'ProfileController@edit');
	Route::patch('/profile/{user}', 'ProfileController@update');
    Route::delete('/profile/{user}', 'ProfileController@destroy');
        
    Route::get('/testindex', 'DateController@index');
    Route::get('/testshow', 'DateController@show');
    
    Route::get('/logs/{date?}', 'LogController@index')->name('dashboard');
    Route::post('/logs/create', 'LogController@create');
	Route::post('/logs', 'LogController@store');

	Route::get('/products', 'ProductController@index')->name('products');
	Route::get('/products/create', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
    Route::delete('/products/{product}', 'ProductController@destroy');
    
    Route::get('/search', 'SearchController@index');
    Route::get('/results', 'SearchController@search');
});

Auth::routes();