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
            $table->id();
            $table->string('pasiens_no_rm');
            $table->date('tanggal_pemeriksaan');
            $table->foreignId('users_id');
            $table->string('tensi', 10);
            $table->mediumInteger('nadi');
            $table->mediumInteger('resp');
            $table->mediumInteger('suhu');
            $table->string('bb', 10);
            $table->string('tb', 10);
            $table->string('imt', 50);
            $table->string('sirkulasi_cairan', 100);
            $table->string('perkemihan', 100);
            $table->string('pernapasan', 100);
            $table->string('pencernaan', 100);
            $table->string('muskuloskeletal', 100);
            // end Data Pengkajian 
            // Neurosensori
            $table->string('fungsi_penglihatan', 100);
            $table->string('fungsi_pendengaran', 100);
            $table->string('fungsi_perasa', 100);
            $table->string('fungsi_perabaan', 100);
            $table->string('fungsi_penciuman', 100);
            // end Neurosensori
            $table->string('kulit', 100);
            $table->string('tidur_istirahat', 100);
            $table->string('mental', 100);
            $table->string('komunikasi', 100);
            $table->string('kebersihan_diri', 100);
            $table->string('perawatan_diri', 100);
            $table->string('labolatorium');
            $table->string('radiologi');
            $table->string('ekg');
            $table->string('usg');

            $table->foreign('pasiens_no_rm')->references('no_rm')->on('pasiens');
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
