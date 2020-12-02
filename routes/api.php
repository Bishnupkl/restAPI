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

Route::get('students', 'ApiController@getAllStudents');
Route::get('students/{id}', 'ApiController@getStudent');
Route::post('students', 'ApiController@createStudent');
Route::put('students/{id}', 'ApiController@updateStudent');
Route::delete('students/{id}','ApiController@deleteStudent');


//for oauth authentication
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
      Route::post('register', 'Auth\AuthController@register');
          Route::post('gps', 'GpsController@store');

      Route::group([
          'middleware' => 'auth:api'
       ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
           Route::get('user', 'Auth\AuthController@user');
    });
});
