<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kerentanan_sosial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id');
            $table->double('kepadatan_penduduk');
            $table->double('rasio_jenis_kelamin');
            $table->double('rasio_kemiskinan');
            $table->double('rasio_orang_cacat');
            $table->double('rasio_kelompok_umur');
            $table->double('hasil_kerensos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerentanan_sosial');
    }
};
