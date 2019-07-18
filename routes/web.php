<?php

// Auth Controllers
Auth::routes();

// Welcome Controller
Route::get('/', 'WelcomeController@show');
// Admin Dashboard Controller
Route::get('/admin', 'AdminController@show');
// Profile Controller
Route::get('/profile', 'ProfileController@show');
// Edit Profile Controller
Route::get('/profile/edit', 'EditProfileController@show');
Route::patch('/profile/edit', 'EditProfileController@update');

// Place Routes
Route::get('/place/find/{id}', 'PlaceController@show');

Route::get('/place/all', 'PlaceController@index');
Route::post('/place/submit', 'PlaceController@store');
Route::put('/place/edit/{id}', 'PlaceController@update');
Route::delete('/place/destroy/{id}', 'PlaceController@destroy');

// Countries Routes
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

// Dish Routes
Route::get('/dish/all', 'DishController@index');
Route::get('/dish/find/{id}', 'DishController@show');
Route::post('/dish/submit', 'DishController@store');
Route::put('/dish/edit/{id}', 'DishController@update');
Route::delete('/dish/destroy/{id}', 'DishController@destroy');

// Comment Routes
Route::get('/comment/all', 'CommentController@index');
Route::get('/comment/find/{id}', 'CommentController@show');
Route::post('/comment/submit', 'CommentController@store');
Route::put('/comment/edit/{id}', 'CommentController@update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy');

// Purchase Routes
Route::get('/purchase/all', 'PurchaseController@index');
Route::get('/purchase/find/{id}', 'PurchaseController@show');
Route::post('/purchase/submit', 'PurchaseController@store');
Route::put('/purchase/edit/{id}', 'PurchaseController@update');
Route::delete('/purchase/destroy/{id}', 'PurchaseController@destroy');

// Ingredient Routes
Route::get('/ingredient/all', 'IngredientController@index');
Route::get('/ingredient/find/{id}', 'IngredientController@show');
Route::post('/ingredient/submit', 'IngredientController@store');
Route::put('/ingredient/edit/{id}', 'IngredientController@update');
Route::delete('/ingredient/destroy/{id}', 'IngredientController@destroy');

// UserRegister Routes
Route::get('/userRegister/all', 'UserRegisterController@index');
Route::get('/userRegister/find/{id}', 'UserRegisterController@show');
Route::post('/userRegister/submit', 'UserRegisterController@store');

// Menu Routes
Route::get('/menu/all', 'MenuController@index');
Route::get('/menu/find/{id}', 'MenuController@show');
Route::post('/menu/submit', 'MenuController@store');
Route::put('/menu/edit/{id}', 'MenuController@update');
Route::delete('/menu/destroy/{id}', 'MenuController@destroy');

// MenuDish Routes
Route::get('/menuDish/all', 'MenuDishController@index');
Route::get('/menuDish/find/{id}', 'MenuDishController@show');
Route::post('/menuDish/submit', 'MenuDishController@store');
Route::put('/menuDish/edit/{id}', 'MenuDishController@update');
Route::delete('/menuDish/destroy/{id}', 'MenuDishController@destroy');

// PaymentMethod Routes
Route::get('/paymentMethod/all', 'PaymentMethodController@index');
Route::get('/paymentMethod/find/{id}', 'PaymentMethodController@show');
Route::post('/paymentMethod/submit', 'PaymentMethodController@store');
Route::put('/paymentMethod/edit/{id}', 'PaymentMethodController@update');
Route::delete('/paymentMethod/destroy/{id}', 'PaymentMethodController@destroy');

// PaymentVoucher Routes
Route::get('/paymentVoucher/all', 'PaymentVoucherController@index');
Route::get('/paymentVoucher/find/{id}', 'PaymentVoucherController@show');
Route::post('/paymentVoucher/submit', 'PaymentVoucherController@store');
Route::put('/paymentVoucher/edit/{id}', 'PaymentVoucherController@update');
Route::delete('/paymentVoucher/destroy/{id}', 'PaymentVoucherController@destroy');

// Permission Routes
Route::get('/permission/all', 'PermissionController@index');
Route::get('/permission/find/{id}', 'PermissionController@show');
Route::post('/permission/submit', 'PermissionController@store');
Route::put('/permission/edit/{id}', 'PermissionController@update');
Route::delete('/permission/destroy/{id}', 'PermissionController@destroy');

// PermissionRole Routes
Route::get('/permissionRole/all', 'PermissionRoleController@index');
Route::get('/permissionRole/find/{id}', 'PermissionRoleController@show');
Route::post('/permissionRole/submit', 'PermissionRoleController@store');
Route::put('/permissionRole/edit/{id}', 'PermissionRoleController@update');
Route::delete('/permissionRole/destroy/{id}', 'PermissionRoleController@destroy');

// Reservation Routes
Route::get('/reservation/all', 'ReservationController@index');
Route::get('/reservation/find/{id}', 'ReservationController@show');
Route::post('/reservation/submit', 'ReservationController@store');
Route::put('/reservation/edit/{id}', 'ReservationController@update');
Route::delete('/reservation/destroy/{id}', 'ReservationController@destroy');

// UserCity Routes
Route::get('/userCity/all', 'UserCityController@index');
Route::get('/userCity/find/{id}', 'UserCityController@show');
Route::post('/userCity/submit', 'UserCityController@store');
Route::put('/userCity/edit/{id}', 'UserCityController@update');
Route::delete('/userCity/destroy/{id}', 'UserCityController@destroy');

// Table Routes
Route::get('/table/all', 'TableController@index');
Route::get('/table/find/{id}', 'TableController@show');
Route::post('/table/submit', 'TableController@store');
Route::put('/table/edit/{id}', 'TableController@update');
Route::delete('/table/destroy/{id}', 'TableController@destroy');

// TableReservation Routes
Route::get('/tableReservation/all', 'TableReservationController@index');
Route::get('/tableReservation/find/{id}', 'TableReservationController@show');
Route::post('/tableReservation/submit', 'TableReservationController@store');
Route::put('/tableReservation/edit/{id}', 'TableReservationController@update');
Route::delete('/tableReservation/destroy/{id}', 'TableReservationController@destroy');
