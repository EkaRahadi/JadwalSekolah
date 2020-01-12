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
            $table->unsignedBigInteger('hari')->index();
            $table->foreign('hari')->references('id_hari')->on('hari');
            $table->unsignedBigInteger('event');
            $table->foreign('event')->references('id_event')->on('event');
            $table->unsignedBigInteger('jam');
            $table->foreign('jam')->references('id_jam')->on('jam');
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
