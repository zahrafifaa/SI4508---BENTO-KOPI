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
        Schema::create('Reservation_Info', function (Blueprint $table) {
            $table->bigIncrements('ReservationID');
            $table->string('Name');
            $table->string('PhoneNum');
            $table->date('ReservationDate');
            $table->time('ReservationTime');
            $table->integer('NumOfVisitor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('Reservation_Info');
    }
};
