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

Route::get('/', function () {
    return view('welcome');
});

// Country Routes
Route::get('/country/all', 'CountryController@index');
Route::get('/country/find/{id}', 'CountryController@show');
Route::post('/country/submit', 'CountryController@store');
Route::put('/country/edit/{id}', 'CountryController@update');
Route::delete('/country/destroy/{id}', 'CountryController@destroy');

// Comments Routes
Route::get('/comment/all', 'CommentController@index');
Route::get('/comment/find/{id}', 'CommentController@show');
Route::post('/comment/submit', 'CommentController@store');
Route::put('/comment/edit/{id}', 'CommentController@update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy');

// Cities Routes
Route::get('/city/all', 'CityController@index');
Route::get('/city/find/{id}', 'CityController@show');
Route::post('/city/submit', 'CityController@store');
Route::put('/city/edit/{id}', 'CityController@update');
Route::delete('/city/destroy/{id}', 'CityController@destroy');

// User Routes
Route::get('/user/all', 'UserController@index');
Route::get('/user/find/{id}', 'UserController@show');
Route::post('/user/submit', 'UserController@store');
Route::put('/user/edit/{id}', 'UserController@update');
Route::delete('/user/destroy/{id}', 'UserController@destroy');

// Place Routes
Route::get('/place/all', 'PlaceController@index');
Route::get('/place/find/{id}', 'PlaceController@show');
Route::post('/place/submit', 'PlaceController@store');
Route::put('/place/edit/{id}', 'PlaceController@update');
Route::delete('/place/destroy/{id}', 'PlaceController@destroy');

// Dish Routes
Route::get('/dish/all', 'DishController@index');
Route::get('/dish/find/{id}', 'DishController@show');
Route::post('/dish/submit', 'DishController@store');
Route::put('/dish/edit/{id}', 'DishController@update');
Route::delete('/dish/destroy/{id}', 'DishController@destroy');
Auth::routes();

// Place Routes
Route::get('/comment/all', 'CommentController@index');
Route::get('/comment/find/{id}', 'CommentController@show');
Route::post('/comment/submit', 'CommentController@store');
Route::put('/comment/edit/{id}', 'CommentController@update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
