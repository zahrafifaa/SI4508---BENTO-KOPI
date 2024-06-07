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
        Schema::table('meja', function (Blueprint $table) {
            $table->integer('jumlah_maksimal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meja', function (Blueprint $table) {
            $table->dropColumn('jumlah_maksimal');
        });
    }
};
