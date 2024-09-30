<?php

namespace App\Http\Controllers\Frontend;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\BlogArticle;
use App\Models\BlogArticleCategory;
use App\Models\BlogArticleWriter;
use stdClass;

class ArticleController extends Controller
{
    public function articlelist()
    {
        $all_blogs = BlogArticle::with('blog_article_writer')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        $article_main_title = "Article - School Dekho";
        $article_categories = BlogArticleCategory::all();
        $article_all_categories = [];
        foreach ($article_categories as $category) {
            $x = new stdClass(); 
            $x->category_name = $category->category_name;
            $x->slug = $category->slug; 
            $total_articles = BlogArticle::where('article_blog_category_id', $category->id)->where('status', 1)->count();
            $x->article_count = $total_articles;
            array_push($article_all_categories, $x);
        } 
        $latest_articles = BlogArticle::orderBy('created_at', 'DESC')->where('status', 1)->take(3)->get();
        return view('frontend.article-list', compact('all_blogs', 'article_main_title', 'article_all_categories', 'latest_articles'));
    }

    public function articlecategorylist($category_slug)
    {
        $category_details_for_title = 5;
        $category_id = BlogArticleCategory::where('slug', $category_slug)->first()->id;
        $category_name = BlogArticleCategory::where('slug', $category_slug)->first()->category_name;
        $all_blogs = BlogArticle::where('article_blog_category_id', $category_id)->where('status', 1)->paginate(5);
        $article_categories = BlogArticleCategory::all();
        $article_all_categories = [];
        foreach ($article_categories as $category) {
            $x = new stdClass();
            $x->category_name = $category->category_name;
            $x->slug = $category->slug;
            $total_articles = BlogArticle::where('article_blog_category_id', $category->id)->where('status', 1)->count();
            $x->article_count = $total_articles;
            array_push($article_all_categories, $x);
        } 
        $latest_articles = BlogArticle::orderBy('created_at', 'DESC')->where('status', 1)->take(3)->get();
        return view('frontend.article-list', compact('all_blogs', 'category_details_for_title', 'category_name', 'article_all_categories', 'latest_articles'));
    }

    public function articledetails($customurl)
    {
        $article_details = BlogArticle::with('blog_article_writer')->where('custom_url', $customurl)->first();
        if ($article_details->status == 0) {
            return redirect()->route('schools.index');
        }
        $blog_image_path = FileHelper::GetFileUrl($article_details->blog_image_path, FileHelper::$articlebanner);
        $article_categories = BlogArticleCategory::all();
        $article_all_categories = [];
        foreach ($article_categories as $category) {
            $x = new stdClass();
            $x->category_name = $category->category_name;
            $x->slug = $category->slug;
            $total_articles = BlogArticle::where('article_blog_category_id', $category->id)->where('status', 1)->count();
            $x->article_count = $total_articles;
            array_push($article_all_categories, $x);
        }
        $latest_articles = BlogArticle::orderBy('created_at', 'DESC')->where('status', 1)->take(3)->get();
        $current_article_id = $article_details->id;
        $previous_article_id = BlogArticle::where('id', '<', $current_article_id)->where('status', 1)->max('id');
        $next_article_id = BlogArticle::where('id', '>', $current_article_id)->where('status', 1)->min('id');
        $previous_article_details = BlogArticle::where('id', $previous_article_id)->where('status', 1)->first();
        $next_article_details = BlogArticle::where('id', $next_article_id)->where('status', 1)->first();
        return view('frontend.article-details', compact('article_details', 'blog_image_path', 'previous_article_details', 'next_article_details', 'article_categories', 'article_all_categories', 'latest_articles'));
    }

    public function authorwise_articles($author_slug)
    {
        $author_id = BlogArticleWriter::where('slug', $author_slug)->first()->id;
        $all_blogs = BlogArticle::with('blog_article_writer')->where('status', 1)->where('blog_article_writer_id', $author_id)->paginate(5);
        $author_details = BlogArticleWriter::where('id', $author_id)->first();
        $article_categories = BlogArticleCategory::all();
        $article_all_categories = [];
        foreach ($article_categories as $category) {
            $x = new stdClass(); 
            $x->category_name = $category->category_name;
            $x->slug = $category->slug;
            $total_articles = BlogArticle::where('article_blog_category_id', $category->id)->where('status', 1)->count();
            $x->article_count = $total_articles;
            array_push($article_all_categories, $x);
        }
        $latest_articles = BlogArticle::orderBy('created_at', 'DESC')->where('status', 1)->take(3)->get();
        return view(
            'frontend.article-list-author',
            compact('all_blogs', 'author_details', 'article_all_categories', 'latest_articles')
        );
    }

}
