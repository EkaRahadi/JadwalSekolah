<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_exam', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal_exam');
            $table->unsignedBigInteger('id_hari')->index();
            $table->foreign('id_hari')->references('id_hari')->on('hari');
            $table->unsignedBigInteger('id_event')->index();
            $table->foreign('id_event')->references('id_event')->on('event');
            $table->unsignedBigInteger('id_ringtone')->index();
            $table->foreign('id_ringtone')->references('id_ringtone')->on('ringtone');
            $table->timeTz('jam');
            $table->string('gelombang');
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
        Schema::dropIfExists('jadwal_exam');
    }
}
