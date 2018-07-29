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


// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin')->name('login');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get('home', 'HomeController@index')->name('home');

Route::get('CrearPersona', function () {
    return view('crearPersona');
})->name('CrearPersona');

Route::get('simularCredito', function () {
    return view('simuladorCredito');
})->name('simularCredito');






