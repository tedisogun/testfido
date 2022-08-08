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
        Schema::create('public_key', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ec', 'rsa']);
            // type scheme is curve for ec and padding pkcs or pss for rsa
            $table->enum("type_scheme", [
                'p256',
                'p384',
                'p521',
                'pkcs1',
                'pss'
            ]);
            $table->enum("hash_name",[
                'sha1',
                'sha256',
                'sha384',
                'sha512'
            ]);
            // In hex text format, ec start with 0x04
            $table->string('key', 2000);
            $table->bigInteger('counter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_key');
    }
};
