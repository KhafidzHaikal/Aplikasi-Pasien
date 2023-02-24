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
        Schema::create('obats', function (Blueprint $table) {
            $table->string('no_obat', 100)->primary();
            $table->date('tanggal_masuk');
            $table->string('name', 100);
            $table->string('sediaan', 100);
            $table->date('tanggal_kadaluarsa');
            $table->string('sumber_dana', 100);
            $table->bigInteger('harga');
            $table->integer('stok_lama');
            $table->integer('stok_baru');
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
        Schema::dropIfExists('obats');
    }
};
