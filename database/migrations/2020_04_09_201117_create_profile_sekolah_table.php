<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_sekolah', function (Blueprint $table) {
            $table->bigIncrements('id_profile_sekolah');
            $table->string('nama_sekolah', 255);
            $table->string('kontak');
            $table->mediumText('alamat');
            $table->string('link_website');
            $table->longText('visi_misi');
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
        Schema::dropIfExists('profile_sekolah');
    }
}
