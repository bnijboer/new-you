<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController')->name('landing');

Route::middleware('auth')->group(function ()
{
    Route::get('/logs', 'LogController@index')->name('dashboard');
    Route::post('/logs/create', 'LogController@create');
	Route::post('/logs', 'LogController@store');
	Route::get('/logs/{log}/edit', 'LogController@edit');
	Route::patch('/logs/{log}', 'LogController@update');
    Route::delete('/logs/{log}', 'LogController@destroy');

	Route::get('/products', 'ProductController@index')->name('products');
	Route::get('/products/create', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
    
	Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile');
	Route::get('/profile/{user:username}/edit', 'ProfileController@edit');
	Route::patch('/profile/{user:username}', 'ProfileController@update');
    
    Route::get('/diets/create', 'DietController@create');
    Route::post('/diets', 'DietController@store');
    Route::get('/diets/{diet}', 'DietController@show');
    
	Route::post('/diets/end', 'DietEndController@store');
    Route::patch('/update-weight', 'DietEndController@update');
    
    Route::get('/assistance', function(){
        return view('assistance');
    });
    
    Route::post('/dates', 'DateController@store')->name('date');
});

Auth::routes();