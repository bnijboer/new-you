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

Route::get('/', function ()
{
	return view('landing');
})->name('landing');

Route::middleware('auth')->group(function ()
{
	Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile');
	Route::get('/profile/{user:username}/edit', 'ProfileController@edit');
	Route::patch('/profile/{user:username}', 'ProfileController@update');
    Route::delete('/profile/{user:username}', 'ProfileController@destroy');
    
    Route::get('/diets/{diet}', 'DietController@create');
    Route::post('/diets', 'DietController@store');
    
    Route::get('/diets/activate', 'DietController@activate')->name('activate');
    
	Route::patch('/diets/{diet}', 'DietController@update');
    Route::delete('/diets/{diet}', 'DietController@destroy');
    
    
    Route::post('/dates', 'DateController@store')->name('date');
    
    // Route::get('/testindex', 'DateController@index');
    
    Route::get('/logs', 'LogController@index')->name('dashboard');    
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