<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('nisn', true);
            $table->string('nama');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->enum('jenis_kelamin',['l','p']);
            $table->longtext('alamat');
            $table->string('email');
            $table->string('agama');
            $table->date('tgl_lahir');
            $table->timestamps();
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
