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
        Schema::create('school_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('education')->nullable();
            $table->string('classroom')->nullable();
            $table->string('lab')->nullable();
            $table->string('boarding')->nullable();
            $table->string('sports')->nullable();
            $table->string('arts')->nullable();
            $table->string('digital')->nullable();
            $table->string('food')->nullable();
            $table->string('security')->nullable();
            $table->string('medical')->nullable();
            $table->string('infra')->nullable();
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
        Schema::dropIfExists('school_facilities');
    }
};
