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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->string('no_rm', 50)->primary();
            $table->date('tanggal_kunjungan');
            $table->foreignId('users_id');
            $table->string('name', 100);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 50);
            $table->bigInteger('nik');
            $table->string('nama_kk', 100);
            $table->text('alamat');
            $table->string('pekerjaan', 100);
            $table->string('pendidikan', 50);
            $table->string('agama', 50);
            $table->string('status_perkawinan', 50);
            $table->string('pembiayaan', 50);
            $table->string('status_kunjungan', 30);
            $table->string('alergi_obat');
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
        Schema::dropIfExists('pasiens');
    }
};
