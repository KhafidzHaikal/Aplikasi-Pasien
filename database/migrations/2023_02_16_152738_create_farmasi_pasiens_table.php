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
        Schema::create('farmasi_pasiens', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pelayanan');
            $table->foreignId('pelayanan_pasiens_id');
            $table->string('obats_id');
            $table->integer('stok');
            $table->string('dosis');
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
        Schema::dropIfExists('farmasi_pasiens');
    }
};
