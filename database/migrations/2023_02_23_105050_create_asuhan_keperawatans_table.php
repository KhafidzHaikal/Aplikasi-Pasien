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
        Schema::create('asuhan_keperawatans', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('pelayanan_pasiens_id');
            $table->date('tanggal_pengkajian');
            $table->foreignId('users_id');
            $table->string('data_obyektif');
            $table->string('data_subyektif');
            $table->string('hasil_penunjang');
            $table->string('diagnosas_kode_sdki');
            $table->string('tujuan');
            $table->string('intervensi');
            $table->string('implementasi');
            $table->string('subyektif');
            $table->string('obyektif');
            $table->string('assesment');
            $table->string('planning');

            $table->foreign('pelayanan_pasiens_id')->references('id')->on('pelayanan_pasiens')->onDelete('cascade');
            $table->foreign('diagnosas_kode_sdki')->references('kode_sdki')->on('diagnosas')->onDelete('cascade');
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
        Schema::dropIfExists('asuhan_keperawatans');
    }
};
