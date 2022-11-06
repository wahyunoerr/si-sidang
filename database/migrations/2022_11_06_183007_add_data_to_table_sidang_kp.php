<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToTableSidangKp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_sidang_kp', function (Blueprint $table) {
            $table->date('tanggal_sidang')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->string('ketua_sidang')->nullable();
            $table->string('penguji_1')->nullable();
            $table->string('penguji_2')->nullable();
            $table->text('catatan_revisi')->nullable();
            $table->text('catatan_revisi2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_sidang_kp', function (Blueprint $table) {
            //
        });
    }
}
