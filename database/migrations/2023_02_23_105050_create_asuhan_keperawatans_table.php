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
            $table->string('users_id',32);
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

            $table->foreign('users_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('pelayanan_pasiens_id')->references('id')->on('pelayanan_pasiens')->onDelete('CASCADE');
            $table->foreign('diagnosas_kode_sdki')->references('kode_sdki')->on('diagnosas')->onDelete('CASCADE');
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
