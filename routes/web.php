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

// Route::get('/test', 'ProductController@index');

Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@search');


Route::post('ajaxRequest', 'ProductController@ajaxRequestPost');

Route::get('dynamic-field', 'DynamicFieldController@index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');

Route::get('/', function () {
	return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {
	Route::get('/profile/create', 'ProfileController@create');
	Route::post('/profile', 'ProfileController@store');
	Route::get('/profile/{profile}', 'ProfileController@show')->name('profile');
	Route::get('/profile/{profile}/edit', 'ProfileController@edit');
	Route::put('/profile/{profile}', 'ProfileController@update');
    Route::delete('/profile/{profile}', 'ProfileController@destroy');
    
    Route::get('/logs', 'LogController@index')->name('dashboard');
    Route::post('/logs/create', 'LogController@create');
	Route::post('/logs', 'LogController@store');

	Route::get('/meals', 'MealController@index');
	Route::get('/meals/create', 'MealController@create');
	Route::post('/meals', 'MealController@store');
	Route::get('/meals/{meal}', 'MealController@show');
	Route::get('/meals/{meal}/edit', 'MealController@edit');
	Route::put('/meals/{meal}', 'MealController@update');
	Route::delete('/meals/{meal}', 'MealController@destroy');

	Route::get('/products', 'ProductController@index')->name('products');
	Route::get('/products/create', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
	Route::delete('/products/{product}', 'ProductController@destroy');
});

Auth::routes();