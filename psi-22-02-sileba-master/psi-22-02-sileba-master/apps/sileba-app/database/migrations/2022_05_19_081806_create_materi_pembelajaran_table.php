<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matpel_id')->unsigned();
            $table->integer('kelas_id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('berkas_materi');
            $table->timestamps();
            $table->foreign('matpel_id')->references('id')->on('mata_pelajaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_pembelajaran');
    }
}
