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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// 登入
Route::post('/login', 'LoginController@login')->name('loginCheck');
// 登出
Route::post('/logout', 'LoginController@logout')->name('loginOut');

//Constellations
Route::get('/constellations', 'CatchController@index');
Route::get('/constellations/store', 'CatchController@store');
