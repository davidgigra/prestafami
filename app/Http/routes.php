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
Route::get('home', 'clientController@index')->name('home');


Route::resource('client','clientController');
Route::post('clientdestroy','clientController@eliminar')->name('clientdestroy');
Route::post('clientupdate','clientController@actualizar')->name('clientupdate');


Route::get('simularCredito', function () {
    return view('simuladorCredito');
})->name('simularCredito');

Route::get('cambiarContraseña', 'Auth\passwordController@getEmail')->name('cambiarContraseña');
Route::post('cambiarContraseña', 'Auth\passwordController@postEmail')->name('cambiarContraseña');

Route::get('restablecerContrasena/{token}', 'Auth\passwordController@getReset')->name('restablecerContrasena');
Route::post('restablecerContrasena', 'Auth\passwordController@postReset')->name('restablecerContrasena');

Route::get('cContrasena', 'cContrasena@getReset')->name('cContrasena');
Route::post('cContrasena', 'cContrasena@postReset')->name('cContrasena');






