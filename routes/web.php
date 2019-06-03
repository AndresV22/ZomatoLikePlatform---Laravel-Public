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
Route::get('/country', 'CountryController@index');
Route::get('/country/find/{id}', 'CountryController@show');
Route::delete('/country/destroy/{id}', 'CountryController@destroy');
Route::post('/country', 'CountryController@store');
Route::put('/country/edit/{id}', 'CountryController@update');