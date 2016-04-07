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

    Route::resource('perfil', 'UsersController',
        array('only' => array('edit', 'update')));

    Route::resource('usuarios', 'UsersController',
        array('only' => array('show', 'store', 'destroy', 'update')));

    Route::resource('indicacoes', 'IndicacoesController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::auth();

    Route::get('/home', 'HomeController@index');

});
