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

Route::get('/logout', 'AdminController@logout');

Route::get('/dashboard', 'AdminController@dashboard');

Route::post('/login/proses', 'AdminController@login_proses');

Route::get('/ringtone', 'RingtoneController@ringtone');

Route::post('/ringtone/tambah', 'RingtoneController@tambah_ringtone');

Route::post('/ringtone/ubah', 'RingtoneController@ubah_ringtone');

Route::post('/ringtone/hapus', 'RingtoneController@hapus_ringtone');

Route::get('/jadwal', 'JadwalController@jadwal');

Route::post('/jadwal/tambah', 'JadwalController@tambah_jadwal');

Route::post('/jadwal/ubah', 'JadwalController@ubah_jadwal');

Route::post('/jadwal/hapus', 'JadwalController@hapus_jadwal');

Route::get('/jadwal/event', 'JadwalController@event');

Route::post('/jadwal/event/tambah', 'JadwalController@tambah_event');

Route::post('/jadwal/event/ubah', 'JadwalController@ubah_event');

Route::post('/jadwal/event/hapus', 'JadwalController@hapus_event');

Route::get('/jadwal/hari', 'JadwalController@hari');

Route::post('/jadwal/hari/tambah', 'JadwalController@tambah_hari');

Route::post('/jadwal/hari/ubah', 'JadwalController@ubah_hari');

Route::post('/jadwal/hari/hapus', 'JadwalController@hapus_hari');

Route::get('/dataSekolah/kelas', 'DataSekolahController@kelas');

Route::post('/dataSekolah/kelas/tambah', 'DataSekolahController@tambah_kelas');

Route::post('/dataSekolah/kelas/ubah', 'DataSekolahController@ubah_kelas');

Route::post('/dataSekolah/kelas/hapus', 'DataSekolahController@hapus_kelas');

Route::get('/dataSekolah/siswa', 'SiswaController@index');

Route::post('/dataSekolah/siswa/tambah', 'SiswaController@tambahSiswa');

Route::post('/dataSekolah/siswa/ubah', 'SiswaController@ubahSiswa');

Route::post('/dataSekolah/siswa/hapus', 'SiswaController@hapusSiswa');

Route::get('/orangtua', 'OrangTuaController@index');

Route::post('/orangtua/tambah', 'OrangTuaController@tambahOrangTua');

Route::post('/orangtua/ubah', 'OrangTuaController@ubahOrangTua');

Route::post('/orangtua/hapus', 'OrangTuaController@hapusOrangTua');

Route::get('/pemberitahuan', 'PemberitahuanController@pemberitahuan');

Route::post('/pemberitahuan/kirim/email/{i}', 'PemberitahuanController@kirim_email');


