<?php

namespace App\Service;

use App\Models\BlogArticleCategory;
use Str;

class ArticleService
{
    public function add_article_category($data)
    {

        $entity = new BlogArticleCategory();
        $entity->category_name = $data['category_name'];
        $entity->slug = Str::slug($data['category_name']);
        $entity->save();
        return $entity;
    }

    public function update_article_category($data)
    {
        $entity = BlogArticleCategory::where('id', $data['id'])->first();
        $entity->category_name = $data['category_name'];
        $entity->slug = Str::slug($data['category_name']);
        $entity->update($entity->toArray());
        return $entity;
    }

    public function get_blog_article_list()
    {
        $all_blog_categories = BlogArticleCategory::all();
        return $all_blog_categories;
    }
}
