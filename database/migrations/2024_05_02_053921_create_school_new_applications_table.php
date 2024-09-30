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
        Schema::create('school_new_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->references('id')->on('schools')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('seeking_class')->nullable();
            $table->string('school_type')->nullable();
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
        Schema::dropIfExists('school_new_applications');
    }
};
