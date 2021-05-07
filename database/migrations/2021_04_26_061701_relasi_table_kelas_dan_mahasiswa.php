<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiTableKelasDanMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn('Kelas');
            $table->unsignedBigInteger('Kelas_ID')->nullable();
            $table->foreign('Kelas_ID')->references('id')->on('kelas');
        });
    }

    /**pa
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('Kelas');
            $table->dropForeign(['Kelas_ID']);
        });
    }
}
