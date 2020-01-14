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
    return redirect('login');
});

Route::get('/login', 'AdminController@login_index');

Route::get('/dashboard', 'AdminController@dashboard');

Route::post('/login/proses', 'AdminController@login_proses');

Route::get('/ringtone', 'RingtoneController@index')->name('ringtone');

Route::post('ringtone/tambah', 'RingtoneController@tambahRingtone');

Route::post('ringtone/hapus', 'RingtoneController@hapusRingtone');

Route::get('api.ringtone', 'RingtoneController@apiRingtone')->name('api.ringtone');

Route::get('/jadwal', 'JadwalController@jadwal');

Route::get('/jadwal/event', 'JadwalController@event');

Route::post('/jadwal/event/tambah', 'JadwalController@tambah_event');

Route::post('/jadwal/event/ubah', 'JadwalController@ubah_event');

Route::post('/jadwal/event/hapus', 'JadwalController@hapus_event');

Route::get('/jadwal/jam', 'JadwalController@jam');

Route::post('/jadwal/jam/tambah', 'JadwalController@tambah_jam');

Route::post('/jadwal/jam/ubah', 'JadwalController@ubah_jam');

Route::post('/jadwal/jam/hapus', 'JadwalController@hapus_jam');

Route::get('/jadwal/hari', 'JadwalController@hari');

Route::post('/jadwal/hari/tambah', 'JadwalController@tambah_hari');

Route::post('/jadwal/hari/ubah', 'JadwalController@ubah_hari');

Route::post('/jadwal/hari/hapus', 'JadwalController@hapus_hari');
