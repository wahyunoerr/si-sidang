<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSidangProposal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sidang_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->string('pembimbing_satu');
            $table->string('pembimbing_dua');
            $table->string('judul_proposal');
            $table->string('file_proposal');
            $table->boolean('status_proposal')->default(0);
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
        Schema::dropIfExists('table_sidang_proposal');
    }
}
