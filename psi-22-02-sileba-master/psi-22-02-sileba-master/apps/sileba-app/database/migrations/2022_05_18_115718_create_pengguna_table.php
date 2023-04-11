<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna', true);
            $table->enum('role',['g','s','o']);
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
            $table->integer('nip')->unsigned()->nullable();
            $table->integer('nisn')->unsigned()->nullable();
            $table->integer('id_operator')->unsigned()->nullable();
        });
        Schema::table('pengguna', function ($table) {
            $table->foreign('nip')->references('nip')->on('guru')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_operator')->references('id_operator')->on('operator_sekolah')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
