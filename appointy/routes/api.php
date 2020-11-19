<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/availabilityselector/{id}', 'AvailabilitySelectorController@getMyAvaiblity');
Route::post('/availabilityselector', 'AvailabilitySelectorController@create');
Route::post('/availabilityselector/{id}', 'AvailabilitySelectorController@updateMyAvaiblity');
//Route::delete('/availabilityselector/{id}', 'AvailabilitySelectorController@delete');

Route::get('/booking/{id}/{name}', 'AppointmentBookingController@getMyBookings');
Route::get('/booking/{id}', 'AppointmentBookingController@getMyAppointments');
Route::post('/booking/{id}', 'AppointmentBookingController@updateMyBookings');
Route::post('/booking', 'AppointmentBookingController@create');
//Route::delete('booking/{id}/{name}', 'AppointmentBookingController@delete');