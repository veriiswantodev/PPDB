<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            $table->string('tahun_berdiri')->nullable();
            $table->integer('total_siswa')->nullable();
            $table->text('desc')->nullable();
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            $table->string('tahun_berdiri')->nullable();
            $table->integer('total_siswa')->nullable();
            $table->text('desc')->nullable();
            $table->string('logo')->nullable();
        });
    }
};
