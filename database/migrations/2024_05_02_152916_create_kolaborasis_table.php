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
        Schema::create('kolaborasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
<<<<<<< HEAD
            $table->string('organisasi');
            $table->string('jabatan');
            $table->string('deskripsi_singkat');
            $table->date('tanggal');
            $table->string('surat')->nullable();
            $table->string('email')->nullable();
            $table->integer('nomor')->nullable();
=======
            $table->string('deskripsi_singkat');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
            $table->foreignId('user_id')->constrained('users');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolaborasi');
    }
};
