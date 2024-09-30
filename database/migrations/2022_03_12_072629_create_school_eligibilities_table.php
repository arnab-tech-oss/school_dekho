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
        Schema::create('school_eligibilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pre_nursery')->nullable();
            $table->string('nursery')->nullable();
            $table->string('lkg')->nullable();
            $table->string('ukg')->nullable();
            $table->string('kg')->nullable();
            $table->string('class_one')->nullable();
            $table->string('class_two')->nullable();
            $table->string('class_three')->nullable();
            $table->string('class_four')->nullable();
            $table->string('class_five')->nullable();
            $table->string('class_six')->nullable();
            $table->string('class_seven')->nullable();
            $table->string('class_eight')->nullable();
            $table->string('class_nine')->nullable();
            $table->string('class_ten')->nullable();
            $table->string('class_eleven')->nullable();
            $table->string('class_twelve')->nullable();
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
        Schema::dropIfExists('school_eligibilities');
    }
};
