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

Route::get('/login', 'AdminController@login_index');

Route::get('/dashboard', 'AdminController@dashboard');

Route::post('/login/proses', 'AdminController@login_proses');

Route::get('/ringtone', 'RingtoneController@index')->name('ringtone');

Route::get('api.ringtone', 'RingtoneController@apiRingtone')->name('api.ringtone');
