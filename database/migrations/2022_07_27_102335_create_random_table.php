<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randoms', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['register', 'login']);
            $table->string('challenge', 64);
            $table->string('qr', 64)->nullable();
            // use to store user id when user doing register & null when login request
            $table->string('user_id', 64)->nullable();
            // time a random challenge before expired. timecreated + second life cycle
            $table->timestamp('timeout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('randoms');
    }
};
