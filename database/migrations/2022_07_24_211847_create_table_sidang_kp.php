<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSidangKp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sidang_kp', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->string('pembimbing');
            $table->string('judul_kp');
            $table->string('file_kp');
            $table->boolean('status_kp')->default(0);
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
        Schema::dropIfExists('table_sidang_kp');
    }
}
