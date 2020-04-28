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

Route::get('/admin/gantiPassword', 'AdminController@ganti_password');

Route::post('/admin/gantiPassword/proses', 'AdminController@ganti_password_proses');

Route::get('/admin/opsi', 'AdminController@opsi');

Route::get('/admin/opsi/reguler/simpan', 'AdminController@simpan_opsi_reguler');

Route::get('/admin/opsi/exam/simpan', 'AdminController@simpan_opsi_exam');


Route::get('/admin/ringtone', 'RingtoneController@ringtone');

Route::post('/admin/ringtone/tambah', 'RingtoneController@tambah_ringtone');

Route::post('/admin/ringtone/ubah', 'RingtoneController@ubah_ringtone');

Route::post('/admin/ringtone/hapus', 'RingtoneController@hapus_ringtone');

Route::post('/admin/ringtone/konversi', 'RingtoneController@konversi_sound');


Route::get('/admin/postingan', 'PostinganController@postingan');

Route::post('/admin/postingan/posting', 'PostinganController@tambah_postingan');

Route::post('/admin/postingan/ubah', 'PostinganController@ubah_postingan');

Route::post('/admin/postingan/hapus', 'PostinganController@hapus_postingan');


Route::get('/admin/jadwal', 'JadwalController@jadwal');

Route::post('/admin/jadwal/tambah', 'JadwalController@tambah_jadwal');

Route::post('/admin/jadwal/ubah', 'JadwalController@ubah_jadwal');

Route::post('/admin/jadwal/hapus', 'JadwalController@hapus_jadwal');


Route::get('/admin/jadwal/ujian', 'JadwalController@jadwal_exam');

Route::post('/admin/jadwal/ujian/tambah', 'JadwalController@tambah_jadwal_exam');

Route::post('/admin/jadwal/ujian/ubah', 'JadwalController@ubah_jadwal_exam');

Route::post('/admin/jadwal/ujian/hapus', 'JadwalController@hapus_jadwal_exam');


Route::get('/admin/jadwal/event', 'JadwalController@event');

Route::post('/admin/jadwal/event/tambah', 'JadwalController@tambah_event');

Route::post('/admin/jadwal/event/ubah', 'JadwalController@ubah_event');

Route::post('/admin/jadwal/event/hapus', 'JadwalController@hapus_event');


Route::get('/admin/jadwal/hari', 'JadwalController@hari');

Route::post('/admin/jadwal/hari/tambah', 'JadwalController@tambah_hari');

Route::post('/admin/jadwal/hari/ubah', 'JadwalController@ubah_hari');

Route::post('/admin/jadwal/hari/hapus', 'JadwalController@hapus_hari');


Route::get('/admin/jadwalPelajaran', 'JadwalPelajaranController@jadwal_pelajaran');

Route::post('/admin/jadwalPelajaran/tambah', 'JadwalPelajaranController@tambah_jadwal_pelajaran');

Route::post('/admin/jadwalPelajaran/ubah', 'JadwalPelajaranController@ubah_jadwal_pelajaran');

Route::post('/admin/jadwalPelajaran/hapus', 'JadwalPelajaranController@hapus_jadwal_pelajaran');


Route::get('/admin/jadwalPelajaran/perlengkapan', 'JadwalPelajaranController@perlengkapan');

Route::post('/admin/jadwalPelajaran/perlengkapan/tambah', 'JadwalPelajaranController@tambah_perlengkapan');

Route::post('/admin/jadwalPelajaran/perlengkapan/ubah', 'JadwalPelajaranController@ubah_perlengkapan');

Route::post('/admin/jadwalPelajaran/perlengkapan/hapus', 'JadwalPelajaranController@hapus_perlengkapan');


Route::get('/admin/jadwalPelajaran/pelajaran', 'JadwalPelajaranController@pelajaran');

Route::post('/admin/jadwalPelajaran/pelajaran/tambah', 'JadwalPelajaranController@tambah_pelajaran');

Route::post('/admin/jadwalPelajaran/pelajaran/ubah', 'JadwalPelajaranController@ubah_pelajaran');

Route::post('/admin/jadwalPelajaran/pelajaran/hapus', 'JadwalPelajaranController@hapus_pelajaran');


Route::get('/admin/dataSekolah/kelas', 'DataSekolahController@kelas');

Route::post('/admin/dataSekolah/kelas/tambah', 'DataSekolahController@tambah_kelas');

Route::post('/admin/dataSekolah/kelas/ubah', 'DataSekolahController@ubah_kelas');

Route::post('/admin/dataSekolah/kelas/hapus', 'DataSekolahController@hapus_kelas');


Route::get('/admin/dataSekolah/civitas', 'DataSekolahController@civitas');

Route::post('/admin/dataSekolah/civitas/tambah', 'DataSekolahController@tambah_civitas');

Route::post('/admin/dataSekolah/civitas/ubah', 'DataSekolahController@ubah_civitas');

Route::post('/admin/dataSekolah/civitas/hapus', 'DataSekolahController@hapus_civitas');


Route::get('/admin/dataSekolah/profilSekolah', 'DataSekolahController@profil_sekolah');

Route::post('/admin/dataSekolah/profilSekolah/simpan', 'DataSekolahController@simpan_profil');


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



