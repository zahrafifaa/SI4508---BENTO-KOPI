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
        Schema::create('Info_Reservasi', function (Blueprint $table) {
            $table->bigIncrements('IDReservasi');
            $table->string('Nama');
            $table->string('No_Telp');
            $table->date('Tanggal_Reservasi');
            $table->time('Waktu_Reservasi');
            $table->integer('Jumlah_Pengunjung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Info_Reservasi');
    }
};
