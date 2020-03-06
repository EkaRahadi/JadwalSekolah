<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJadwalPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_pelajaran');
            $table->unsignedBigInteger('id_hari')->index();
            $table->foreign('id_hari')->references('id_hari')->on('hari');
            $table->unsignedBigInteger('id_kelas')->index();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->unsignedBigInteger('id_pelajaran')->index();
            $table->foreign('id_pelajaran')->references('id_pelajaran')->on('tb_pelajaran');
            $table->unsignedBigInteger('id_detail_pelajaran')->index();
            $table->foreign('id_detail_pelajaran')->references('id_detail_pelajaran')->on('tb_detail_pelajaran');
            $table->timeTz('jam');
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
        Schema::dropIfExists('tb_jadwal_pelajaran');
    }
}
