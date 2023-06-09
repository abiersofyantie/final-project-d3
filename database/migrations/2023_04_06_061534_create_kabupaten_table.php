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
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kabupaten');
            $table->string('latitude');
            $table->string('longitude');
            $table->enum('status_ahp', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->string('color_ahp')->nullable();
            $table->enum('status_fahp', ['Tinggi', 'Sedang', 'Rendah'])->nullable();
            $table->string('color_fahp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten');
    }
};
