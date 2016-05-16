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


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('perfil', 'UsersController',
        array('only' => array('edit', 'update')));

    Route::resource('usuarios', 'UsersController',
        array('only' => array('index', 'show', 'store', 'destroy', 'update', 'filtro')));

    Route::resource('indicacoes', 'IndicacoesController');

    Route::get('api/users/{user}', 'UsersController@show');

    Route::post('api/users/filtro', 'UsersController@filtro');
});
