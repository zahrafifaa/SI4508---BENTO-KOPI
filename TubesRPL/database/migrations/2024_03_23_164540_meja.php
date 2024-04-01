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
        //
        Schema::create('Info_Meja', function (Blueprint $table) {
            $table->id('IDMeja')->primary();
            $table->integer('Kapasitas');
            $table->enum('Area_Meja',['Non Smoking','Smoking']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Info_Meja');
    }
};
