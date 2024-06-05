<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('meja', function (Blueprint $table) {
            $table->id();

            $table->enum('jenis', ['Smoking Area', 'No Smoking Area']);
            $table->string('kode')->unique();
            $table->boolean('status')->default(0);

            // $table->string('name');
            // $table->string('username')->unique();
            // $table->string('phone')->unique();
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meja');
    }
};
