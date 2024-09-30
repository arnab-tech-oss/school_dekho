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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('school_logo')->nullable();
            $table->longText('about')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_pic')->nullable();
            $table->longText('principal_desk')->nullable();
            $table->string('school_type')->nullable();
            $table->string('school_medium_id')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('status')->default('pending');
            $table->string('board')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('view_count')->nullable();
            $table->string('is_claimed')->default('no');
            $table->string('category')->nullable();
            $table->string('affiliated')->nullable();
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
        Schema::dropIfExists('schools');
    }
};
