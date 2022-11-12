<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJadwalSidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_jadwal_sidang', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->string('pembimbing_satu');
            $table->string('pembimbing_dua');
            $table->string('judul_proposal');
            $table->string('file_proposal');
            $table->boolean('status_proposal')->default(0);
            $table->string('ketua_sidang');
            $table->string('penguji_1');
            $table->string('penguji_2');
            $table->string('catatan_revisi')->nullable();
            $table->string('catatan_revisi2')->nullable();
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
        Schema::dropIfExists('tbl_jadwal_sidang');
    }
}