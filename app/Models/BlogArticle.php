<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_title',
        'custom_url',
        'blog_meta_description',
        'article_blog_category_id',
        'blog_content',
        'blog_article_writer_id',
        'status',
        'school_id',
    ];

    public function blog_article_category()
    {
        return $this->hasMany(BlogArticleCategory::class, 'article_blog_category_id', 'id');
    }

    public function blog_article_writer()
    {
        return $this->belongsTo(BlogArticleWriter::class, 'blog_article_writer_id', 'id');
    }
}
