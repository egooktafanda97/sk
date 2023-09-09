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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string('nama');
            $table->string('nuptk')->nullable(); // Nomor Induk Pegawai
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('jabatan');
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('masa_pensiun')->nullable();
            $table->string('mulai_bertugas')->nullable();
            $table->string('gaji_pokok')->nullable();
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
        Schema::dropIfExists('gurus');
    }
};
