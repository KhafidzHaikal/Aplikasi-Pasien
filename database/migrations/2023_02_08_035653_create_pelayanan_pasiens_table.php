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
        Schema::create('pelayanan_pasiens', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('kajian_pasiens_id');
            $table->date('tanggal_pemeriksaan');
            $table->foreignId('users_id');
            $table->text('keluhan_utama');
            $table->string('rps');
            $table->string('rpo');
            $table->string('icds_kode_icd');
            $table->string('penatalaksanaan');
            $table->string('tindakan');
            $table->string('edukasi');
            $table->string('jenis_kasus', 100);
            $table->foreignId('unit_pelayanans_id');
            $table->tinyInteger('status');
            $table->tinyInteger('statusAskep');

            // $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kajian_pasiens_id')->references('id')->on('kajian_pasiens')->onDelete('cascade');
            $table->foreign('icds_kode_icd')->references('kode_icd')->on('icds');
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
        Schema::dropIfExists('pelayanan_pasiens');
    }
};
