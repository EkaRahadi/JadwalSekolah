<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->unsignedBigInteger('id_hari')->index();
            $table->foreign('id_hari')->references('id_hari')->on('hari');
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id_event')->on('event');
            $table->unsignedBigInteger('id_jam');
            $table->foreign('id_jam')->references('id_jam')->on('jam');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->unsignedBigInteger('id_ringtone');
            $table->foreign('id_ringtone')->references('id_ringtone')->on('ringtone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
