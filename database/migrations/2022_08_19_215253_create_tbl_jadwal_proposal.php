<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJadwalProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_jadwal_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('no_daftar');
            $table->string('nama_mhs');
            $table->string('penguji_1');
            $table->string('penguji_2');
            $table->string('ketua_sidang');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('tanggal');
            $table->tinyInteger('status')->default(0);
            $table->string('keterangan');
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
        Schema::dropIfExists('tbl_jadwal_proposal');
    }
}