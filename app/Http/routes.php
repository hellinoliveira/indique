<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', function () {
        return view('home');
    });

    Route::resource('api/cliente', 'ClientesController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

//    Route::get('/api/v1/cliente/{id?}', 'ClientesController@index');
//    Route::post('/api/v1/cliente', 'ClientesController@store');
//    Route::post('/api/v1/cliente/{id}', 'ClientesController@update');
//    Route::delete('/api/v1/cliente/{id}', 'ClientesController@destroy');

    Route::auth();
//
    Route::get('/home', 'HomeController@index');

});
//
