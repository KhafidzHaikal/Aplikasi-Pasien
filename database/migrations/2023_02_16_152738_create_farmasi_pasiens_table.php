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
            $table->string('pelayanan_pasiens_id');
            $table->string('users_id',32);
            $table->string('obats_no_obat')->nullable();
            $table->integer('stok')->nullable();
            $table->string('dosis')->nullable();
            $table->string('obatssatu_no_obat')->nullable();
            $table->integer('stoksatu')->nullable();
            $table->string('dosissatu')->nullable();
            $table->string('obatsdua_no_obat')->nullable();
            $table->integer('stokdua')->nullable();
            $table->string('dosisdua')->nullable();
            $table->string('obatstiga_no_obat')->nullable();
            $table->integer('stoktiga')->nullable();
            $table->string('dosistiga')->nullable();
            $table->string('obatsempat_no_obat')->nullable();
            $table->integer('stokempat')->nullable();
            $table->string('dosisempat')->nullable();
            $table->timestamps();
            
            $table->foreign('users_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('pelayanan_pasiens_id')->references('id')->on('pelayanan_pasiens')->onDelete('CASCADE');
            $table->foreign('obats_no_obat')->references('no_obat')->on('obats')->onDelete('CASCADE');
            $table->foreign('obatssatu_no_obat')->references('no_obat')->on('obats')->onDelete('CASCADE');
            $table->foreign('obatsdua_no_obat')->references('no_obat')->on('obats')->onDelete('CASCADE');
            $table->foreign('obatstiga_no_obat')->references('no_obat')->on('obats')->onDelete('CASCADE');
            $table->foreign('obatsempat_no_obat')->references('no_obat')->on('obats')->onDelete('CASCADE');
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
