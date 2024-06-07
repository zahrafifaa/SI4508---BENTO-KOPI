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
            $table->increments('IDMeja');
            $table->integer('Kapasitas');
            $table->enum('Area_Meja',['Non Smoking','Smoking']);
            $table->boolean('available')->default(true); // Add this line
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
