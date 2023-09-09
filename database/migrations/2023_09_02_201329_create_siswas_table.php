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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id');
            $table->string('nama_siswa', 150)->nullable();
            $table->string('nomor_induk', 150)->nullable();
            $table->string('panggilan', 150)->nullable();
            $table->string('tempat_lahir', 150)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kelamin', 150)->nullable();
            $table->string('agama', 150)->nullable();
            $table->string('tk', 150)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->string('nama_ayah', 150)->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->string('pekerjaan_ayah', 150)->nullable();
            $table->string('pekerjaan_ibu', 150)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('kepala_sekolah', 150)->nullable();
            $table->string('status', 20);
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
        Schema::dropIfExists('siswa');
    }
};
