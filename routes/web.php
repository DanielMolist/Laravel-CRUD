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
    return view('index');
});

Route::resource('productos', 'ProductosController')->middleware('auth'); //Petición de login

//Route::get('/productos', 'ProductosController@index');
//Route::get('/productos/create', 'ProductosController@create');
Auth::routes(['reset'=>true]);//register'=>false para quitar el registro de nuevos usuarios

Route::get('/home', 'HomeController@index')->name('home');
