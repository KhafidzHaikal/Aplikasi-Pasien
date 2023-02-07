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
