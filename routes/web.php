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

//Route Admin

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::get('/admin/login', 'AdminController@login_index');

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::post('/admin/login/proses', 'AdminController@login_proses');

Route::get('/admin/ringtone', 'RingtoneController@ringtone');

Route::post('/admin/ringtone/tambah', 'RingtoneController@tambah_ringtone');

Route::post('/admin/ringtone/ubah', 'RingtoneController@ubah_ringtone');

Route::post('/admin/ringtone/hapus', 'RingtoneController@hapus_ringtone');

Route::get('/admin/jadwal', 'JadwalController@jadwal');

Route::post('/admin/jadwal/tambah', 'JadwalController@tambah_jadwal');

Route::post('/admin/jadwal/ubah', 'JadwalController@ubah_jadwal');

Route::post('/admin/jadwal/hapus', 'JadwalController@hapus_jadwal');

Route::get('/admin/jadwal/event', 'JadwalController@event');

Route::post('/admin/jadwal/event/tambah', 'JadwalController@tambah_event');

Route::post('/admin/jadwal/event/ubah', 'JadwalController@ubah_event');

Route::post('/admin/jadwal/event/hapus', 'JadwalController@hapus_event');

Route::get('/admin/jadwal/hari', 'JadwalController@hari');

Route::post('/admin/jadwal/hari/tambah', 'JadwalController@tambah_hari');

Route::post('/admin/jadwal/hari/ubah', 'JadwalController@ubah_hari');

Route::post('/admin/jadwal/hari/hapus', 'JadwalController@hapus_hari');

Route::get('/admin/dataSekolah/kelas', 'DataSekolahController@kelas');

Route::post('/admin/dataSekolah/kelas/tambah', 'DataSekolahController@tambah_kelas');

Route::post('/admin/dataSekolah/kelas/ubah', 'DataSekolahController@ubah_kelas');

Route::post('/admin/dataSekolah/kelas/hapus', 'DataSekolahController@hapus_kelas');

Route::get('/admin/dataSekolah/siswa', 'SiswaController@index');

Route::post('/admin/dataSekolah/siswa/tambah', 'SiswaController@tambahSiswa');

Route::post('/admin/dataSekolah/siswa/ubah', 'SiswaController@ubahSiswa');

Route::post('/admin/dataSekolah/siswa/hapus', 'SiswaController@hapusSiswa');

Route::get('/admin/dataPihakLuar/orangtua', 'OrangTuaController@index');

Route::post('/admin/dataPihakLuar/orangtua/tambah', 'OrangTuaController@tambahOrangTua');

Route::post('/admin/dataPihakLuar/orangtua/ubah', 'OrangTuaController@ubahOrangTua');

Route::post('/admin/dataPihakLuar/orangtua/hapus', 'OrangTuaController@hapusOrangTua');

Route::get('/admin/pemberitahuan', 'PemberitahuanController@pemberitahuan');

Route::post('/admin/pemberitahuan/kirim/email/{i}', 'PemberitahuanController@kirim_email');

Route::post('/admin/pemberitahuan/kirim/sms', 'PemberitahuanController@kirim_sms');



