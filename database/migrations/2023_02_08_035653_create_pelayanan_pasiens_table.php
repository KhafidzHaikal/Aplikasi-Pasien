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
            $table->id();
            $table->foreignId('kajian_pasiens_id');
            $table->date('tanggal_pemeriksaan');
            $table->foreignId('users_id');
            $table->text('keluhan_utama');
            $table->string('rps');
            $table->string('rpo');
            $table->string('tanda_vital');
            $table->string('icds_kode_icd');
            $table->string('diagnosa');
            $table->string('penatalaksanaan');
            $table->string('tindakan');
            $table->string('edukasi');
            $table->string('jenis_kasus', 100);

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
