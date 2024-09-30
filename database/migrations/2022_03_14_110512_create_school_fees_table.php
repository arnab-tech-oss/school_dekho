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
        Schema::create('school_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pre_nursery')->default(',');
            $table->string('nursery')->default(',');
            $table->string('lkg')->default(',');
            $table->string('ukg')->default(',');
            $table->string('kg')->default(',');
            $table->string('class_one')->default(',');
            $table->string('class_two')->default(',');
            $table->string('class_three')->default(',');
            $table->string('class_four')->default(',');
            $table->string('class_five')->default(',');
            $table->string('class_six')->default(',');
            $table->string('class_seven')->default(',');
            $table->string('class_eight')->default(',');
            $table->string('class_nine')->default(',');
            $table->string('class_ten')->default(',');
            $table->string('class_eleven')->default(',');
            $table->string('class_twelve')->default(',');
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
        Schema::dropIfExists('school_fees');
    }
};
