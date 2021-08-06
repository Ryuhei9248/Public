<?php

/* 第一引数にアドレス、第二引数に関数等を入れ、アドレスによって呼び出される処理を記述する */
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{id}', 'UserController@show');

Route::get('me', 'UserController@edit')->middleware('auth');

Route::post('me', 'UserController@update')->middleware('auth');
