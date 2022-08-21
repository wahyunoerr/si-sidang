<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeToTableSidangProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_sidang_proposal', function (Blueprint $table) {
            $table->date('tanggal_sidang')->nullable();
            $table->time('waktu_mulai')->default('BELUM TERJADWAL');
            $table->time('waktu_selesai')->default('BELUM TERJADWAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_sidang_proposal', function (Blueprint $table) {
            //
        });
    }
}