<?php

use Illuminate\Http\Request;
use App\JadwalPelajaran;
use App\JadwalExam;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tes', function () {
    $jadwal_exam = JadwalExam::with('hari', 'event', 'ringtone')->get();

    return $jadwal_exam;
});
