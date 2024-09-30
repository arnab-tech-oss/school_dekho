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
        Schema::create('application_otps', function (Blueprint $table) {
            $table->id();
            $table->string('otp')->nullable();
            $table->string('hash_key')->nullable();
            $table->integer('status')->default(0)->comment('0: pending, 1: verified, 2: failed');
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
        Schema::dropIfExists('application_otps');
    }
};
