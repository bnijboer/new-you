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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/meals', 'MealController@index')->name('dashboard');
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

Route::get('/home', 'HomeController@index')->name('home');
