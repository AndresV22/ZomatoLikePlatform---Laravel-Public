<?php
use App\User;
use App\Place;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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
// sdf
Route::get('/place/{id}/comment', 'MakeCommentController@show');



// Search route
Route::any('/search', function () 
{
    $q = Input::get('query');
    $place = DB::table('places')
    ->join('menus', 'menus.place_id', '=', 'places.id')
    ->select('places.id', 'places.name', 'places.address', 'menus.category', 'places.average_value')
    ->where('name', 'LIKE', '%'.$q.'%')
    ->orWhere('address', 'LIKE', '%'.$q.'%')
    ->orWhere('category', 'LIKE', '%'.$q.'%')
    ->orWhere('average_value', 'LIKE', '%'.$q.'%')
    ->limit(5)
    ->get();
    if (count ($place) > 0)
        return view('welcome')->withDetails($place)->withQuery($q);
    else
        return view('welcome')->withMessage('No details found. Try to search again!');
} );



// Email API routes.
// How to use: Invoke the functions giving a JSON with the following structure:
//				{
//					"name": "insertNameHere"
//					"address": "insertEmailAddressHere"
//				}  

Route::get('/MaxCambiaEsto', 'EmailController@sendOrderConfirmation');
Route::get('/EstoTambienPls', 'EmailController@sendReservationConfirmation');

// Place Routes
Route::get('/place/find/index', 'PlaceController@index');
Route::get('/place/{id}', 'PlaceController@show');
Route::post('/place/submit', 'PlaceController@store');
Route::put('/place/edit/{id}', 'PlaceController@update');
Route::delete('/place/destroy/{id}', 'PlaceController@destroy');

// Countries Routes
Route::get('/country/find/index', 'CountryController@index');
Route::get('/country/{id}', 'CountryController@show');
Route::post('/country/submit', 'CountryController@store');
Route::put('/country/edit/{id}', 'CountryController@update');
Route::delete('/country/destroy/{id}', 'CountryController@destroy');

// Comments Routes
Route::get('/comment/find/index', 'CommentController@index');
Route::get('/comment/{id}', 'CommentController@show');
Route::post('/comment/submit', 'CommentController@store');
Route::put('/comment/edit/{id}', 'CommentController@update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy');

// Cities Routes
Route::get('/city/find/index', 'CityController@index');
Route::get('/city/{id}', 'CityController@show');
Route::post('/city/submit', 'CityController@store');
Route::put('/city/edit/{id}', 'CityController@update');
Route::delete('/city/destroy/{id}', 'CityController@destroy');

// User Routes
Route::get('/user/find/index', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/submit', 'UserController@store');
Route::put('/user/edit/{id}', 'UserController@update');
Route::delete('/user/destroy/{id}', 'UserController@destroy');

// Dish Routes
Route::get('/dish/find/index', 'DishController@index');
Route::get('/dish/{id}', 'DishController@show');
Route::post('/dish/submit', 'DishController@store');
Route::put('/dish/edit/{id}', 'DishController@update');
Route::delete('/dish/destroy/{id}', 'DishController@destroy');

// Comment Routes
Route::get('/comment/find/index', 'CommentController@index');
Route::get('/comment/{id}', 'CommentController@show');
Route::post('/comment/submit', 'CommentController@store');
Route::put('/comment/edit/{id}', 'CommentController@update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy');

// Purchase Routes
Route::get('/purchase/find/index', 'PurchaseController@index');
Route::get('/purchase/{id}', 'PurchaseController@show');
Route::post('/purchase/submit', 'PurchaseController@store');
Route::put('/purchase/edit/{id}', 'PurchaseController@update');
Route::delete('/purchase/destroy/{id}', 'PurchaseController@destroy');

// UserRegister Routes
Route::get('/userRegister/find/index', 'UserRegisterController@index');
Route::get('/userRegister/{id}', 'UserRegisterController@show');
Route::post('/userRegister/submit', 'UserRegisterController@store');

// Menu Routes
Route::get('/menu/find/index', 'MenuController@index');
Route::get('/menu/{id}', 'MenuController@show');
Route::post('/menu/submit', 'MenuController@store');
Route::put('/menu/edit/{id}', 'MenuController@update');
Route::delete('/menu/destroy/{id}', 'MenuController@destroy');

// MenuDish Routes
Route::get('/menuDish/find/index', 'MenuDishController@index');
Route::get('/menuDish/{id}', 'MenuDishController@show');
Route::post('/menuDish/submit', 'MenuDishController@store');
Route::put('/menuDish/edit/{id}', 'MenuDishController@update');
Route::delete('/menuDish/destroy/{id}', 'MenuDishController@destroy');

// PaymentMethod Routes
Route::get('/paymentMethod/find/index', 'PaymentMethodController@index');
Route::get('/paymentMethod/{id}', 'PaymentMethodController@show');
Route::post('/paymentMethod/submit', 'PaymentMethodController@store');
Route::put('/paymentMethod/edit/{id}', 'PaymentMethodController@update');
Route::delete('/paymentMethod/destroy/{id}', 'PaymentMethodController@destroy');

// PaymentVoucher Routes
Route::get('/paymentVoucher/find/index', 'PaymentVoucherController@index');
Route::get('/paymentVoucher/{id}', 'PaymentVoucherController@show');
Route::post('/paymentVoucher/submit', 'PaymentVoucherController@store');
Route::put('/paymentVoucher/edit/{id}', 'PaymentVoucherController@update');
Route::delete('/paymentVoucher/destroy/{id}', 'PaymentVoucherController@destroy');

// Permission Routes
Route::get('/permission/find/index', 'PermissionController@index');
Route::get('/permission/{id}', 'PermissionController@show');
Route::post('/permission/submit', 'PermissionController@store');
Route::put('/permission/edit/{id}', 'PermissionController@update');
Route::delete('/permission/destroy/{id}', 'PermissionController@destroy');

// PermissionRole Routes
Route::get('/permissionRole/find/index', 'PermissionRoleController@index');
Route::get('/permissionRole/{id}', 'PermissionRoleController@show');
Route::post('/permissionRole/submit', 'PermissionRoleController@store');
Route::put('/permissionRole/edit/{id}', 'PermissionRoleController@update');
Route::delete('/permissionRole/destroy/{id}', 'PermissionRoleController@destroy');

// Reservation Routes
Route::get('/reservation/find/index', 'ReservationController@index');
Route::get('/reservation/{id}', 'ReservationController@show');
Route::post('/reservation/submit', 'ReservationController@store');
Route::put('/reservation/edit/{id}', 'ReservationController@update');
Route::delete('/reservation/destroy/{id}', 'ReservationController@destroy');

// UserCity Routes
Route::get('/userCity/find/index', 'UserCityController@index');
Route::get('/userCity/{id}', 'UserCityController@show');
Route::post('/userCity/submit', 'UserCityController@store');
Route::put('/userCity/edit/{id}', 'UserCityController@update');
Route::delete('/userCity/destroy/{id}', 'UserCityController@destroy');

// Table Routes
Route::get('/table/find/index', 'TableController@index');
Route::get('/table/{id}', 'TableController@show');
Route::post('/table/submit', 'TableController@store');
Route::put('/table/edit/{id}', 'TableController@update');
Route::delete('/table/destroy/{id}', 'TableController@destroy');

// TableReservation Routes
Route::get('/tableReservation/find/index', 'TableReservationController@index');
Route::get('/tableReservation/{id}', 'TableReservationController@show');
Route::post('/tableReservation/submit', 'TableReservationController@store');
Route::put('/tableReservation/edit/{id}', 'TableReservationController@update');
Route::delete('/tableReservation/destroy/{id}', 'TableReservationController@destroy');
