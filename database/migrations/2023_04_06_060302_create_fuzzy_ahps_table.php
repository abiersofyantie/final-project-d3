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
        Schema::create('fuzzy_ahps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kabupaten');
            $table->double('nhazard')->nullable()->default(0.0);
            $table->double('nkerensos')->nullable()->default(0.0);
            $table->double('nkereneko')->nullable()->default(0.0);
            $table->double('nkerenfis')->nullable()->default(0.0);
            $table->double('nkerenling')->nullable()->default(0.0);
            $table->double('nindeks')->nullable()->default(0.0);
            $table->double('fuzzy_final')->nullable()->default(0.0);
            $table->double('ahazard')->nullable()->default(0.0);
            $table->double('akerensos')->nullable()->default(0.0);
            $table->double('akereneko')->nullable()->default(0.0);
            $table->double('akerenfis')->nullable()->default(0.0);
            $table->double('akerenling')->nullable()->default(0.0);
            $table->double('aindeks')->nullable()->default(0.0);
            $table->double('ahp_final')->nullable()->default(0.0);
            $table->double('fhazard')->nullable()->default(0.0);
            $table->double('fkerensos')->nullable()->default(0.0);
            $table->double('fkereneko')->nullable()->default(0.0);
            $table->double('fkerenfis')->nullable()->default(0.0);
            $table->double('fkerenling')->nullable()->default(0.0);
            $table->double('findeks')->nullable()->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuzzy_ahps');
    }
};
