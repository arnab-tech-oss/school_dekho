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
        Schema::create('school_academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('academic_year')->nullable();
            $table->string('student_appear')->nullable();
            $table->string('student_passed')->nullable();
            $table->string('abv_nine_five')->nullable();
            $table->string('abv_ninty')->nullable();
            $table->string('abv_eighty')->nullable();
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
        Schema::dropIfExists('school_academics');
    }
};
