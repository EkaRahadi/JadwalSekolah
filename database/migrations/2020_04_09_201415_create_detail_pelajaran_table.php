<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_detail_pelajaran');
            $table->unsignedBigInteger('id_jadwal_pelajaran');
            $table->foreign('id_jadwal_pelajaran')->references('id_jadwal_pelajaran')->on('jadwal_pelajaran');
            $table->unsignedBigInteger('id_perlengkapan');
            $table->foreign('id_perlengkapan')->references('id_perlengkapan')->on('perlengkapan');
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
        Schema::dropIfExists('detail_pelajaran');
    }
}
