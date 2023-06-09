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
        Schema::create('kerentanan_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id');
            $table->double('luas_lahan_produktif');
            $table->double('luas_pdrb');
            $table->double('hasil_kereneko')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerentanan_ekonomi');
    }
};
