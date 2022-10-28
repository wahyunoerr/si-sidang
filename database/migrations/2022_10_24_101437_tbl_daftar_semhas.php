<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDaftarSemhas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_daftar_semhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nim');
            $table->String('nama_lengkap');
            $table->String('pembimbing_satu');
            $table->String('pembimbing_dua');
            $table->String('judul_skripsi');
            $table->tinyInteger('status_bimbingan1')->default(0);
            $table->tinyInteger('status_bimbingan2')->default(0);
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
        Schema::drop('tbl_daftar_semhas');
    }
}