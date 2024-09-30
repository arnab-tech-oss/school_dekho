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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id')->default(0);
            $table->string('vision')->nullable();
            $table->string('prepare_students')->nullable();
            $table->string('difference')->nullable();
            $table->string('balance_learning')->nullable();
            $table->string('teaching_methods')->nullable();
            $table->string('improve_skills')->nullable();
            $table->string('friendly_school')->nullable();
            $table->string('involve_parents')->nullable();
            $table->string('facilities')->nullable();
            $table->string('technology')->nullable();

            // forign key
            $table->foreign('personal_details_id')->references('id')->on('personal_details');

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
        Schema::dropIfExists('interviews');
    }
};
