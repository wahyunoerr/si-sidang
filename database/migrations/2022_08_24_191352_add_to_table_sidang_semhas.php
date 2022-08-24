<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToTableSidangSemhas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_sidang_semhas', function (Blueprint $table) {
            $table->date('tanggal_sidang')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->time('penguji_1')->nullable();
            $table->time('penguji_2')->nullable();
            $table->time('ketua_sidang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_sidang_semhas', function (Blueprint $table) {
            //
        });
    }
}
