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
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title')->nullable();
            $table->string('blog_meta_description')->nullable();
            $table->string('custom_url')->nullable();
            $table->foreignId('article_blog_category_id')->references('id')->on('blog_article_categories');
            $table->longText('blog_content')->nullable();
            $table->foreignId('blog_article_writer_id')->references('id')->on('blog_article_writers');
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
        Schema::dropIfExists('blog_articles');
    }
};
