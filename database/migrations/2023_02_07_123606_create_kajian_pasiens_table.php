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
        Schema::create('kajian_pasiens', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('pasiens_no_rm');
            $table->date('tanggal_pemeriksaan');
            $table->string('users_id',32);
            $table->string('tensi', 10);
            $table->mediumInteger('nadi');
            $table->mediumInteger('resp');
            $table->mediumInteger('suhu');
            $table->string('bb', 10);
            $table->string('tb', 10);
            $table->string('imt', 50);
            $table->string('sirkulasi_cairan');
            $table->string('perkemihan');
            $table->string('pernapasan');
            $table->string('pencernaan');
            $table->string('muskuloskeletal');
            // end Data Pengkajian 
            // Neurosensori
            $table->string('fungsi_penglihatan');
            $table->string('fungsi_pendengaran');
            $table->string('fungsi_perasa');
            $table->string('fungsi_perabaan');
            $table->string('fungsi_penciuman');
            // end Neurosensori
            $table->string('kulit');
            $table->string('tidur_istirahat');
            $table->string('mental');
            $table->string('komunikasi');
            $table->string('kebersihan_diri');
            $table->string('perawatan_diri');
            $table->string('labolatorium');
            $table->string('radiologi');
            $table->string('ekg');
            $table->string('usg');
            $table->foreignId('unit_pelayanans_id');
            $table->tinyInteger('status');

            $table->foreign('pasiens_no_rm')->references('no_rm')->on('pasiens')->onDelete('CASCADE');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('kajian_pasiens');
    }
};
