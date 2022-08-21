<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToTableSidangProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_sidang_proposal', function (Blueprint $table) {
            $table->string('ketua_sidang');
            $table->string('penguji_1');
            $table->string('penguji_2');
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