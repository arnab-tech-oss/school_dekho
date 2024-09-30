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
        Schema::create('school_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact')->nullable();
            $table->string('alt_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
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
        Schema::dropIfExists('school_contacts');
    }
};
