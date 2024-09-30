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
        Schema::create('blog_article_writers', function (Blueprint $table) {
            $table->id();
            $table->string('writer_name')->nullable();
            $table->string('writer_about')->nullable();
            $table->string('social_media')->nullable();
            $table->longText('writer_description')->nullable();
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
        Schema::dropIfExists('blog_article_writers');
    }
};
