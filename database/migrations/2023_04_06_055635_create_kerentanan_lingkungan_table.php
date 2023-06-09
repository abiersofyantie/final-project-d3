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
        Schema::create('kerentanan_lingkungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id');
            $table->double('hutan_lindung');
            $table->double('hutan_alam');
            $table->double('hutan_bakau');
            $table->double('semak_belukar');
            $table->double('hasil_kerenling')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerentanan_lingkungan');
    }
};
