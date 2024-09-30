<?php

namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\BlogArticle;
use App\Models\BlogArticleCategory;
use App\Models\BlogArticleWriter;
use App\Models\School;
use App\Service\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function article_category_list()
    {
        $blog_article_categories = $this->articleService->get_blog_article_list();
        return view('admin.article.category.list', compact('blog_article_categories'));
    }

    public function article_category_add()
    {
        return view('admin.article.category.add');
    }

    public function article_category_submit(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $this->articleService->add_article_category($request->all());
        return redirect()->back()->with('success', 'Blog Category Added');
    }

    public function article_category_update(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $this->articleService->update_article_category($request->all());
        return redirect()->back()->with('success', 'Blog Category Updated');
    }
    //Article Add view
    public function article_add()
    {
        $all_article_blog_categories = $this->articleService->get_blog_article_list();
        $all_article_writers = BlogArticleWriter::all();
        $all_schools = School::with('school_address')->get();
        return view('admin.article.add', compact('all_article_blog_categories', 'all_article_writers', 'all_schools'));
    }

    public function article_list()
    {
        $all_alticles = BlogArticle::paginate(10);
        return view('admin.article.list', compact('all_alticles'));
    }

    public function article_edit($id)
    {
        $all_article_blog_categories = $this->articleService->get_blog_article_list();
        $all_article_writers = BlogArticleWriter::all();
        $article_details = BlogArticle::where('id', $id)->first();
        $all_schools = School::with('school_address')->get();
        return view('admin.article.edit', compact('article_details', 'all_schools', 'all_article_blog_categories', 'all_article_writers'));
    }

    public function article_submit(Request $request)
    {
        // return $request->all();
        $request->validate([
            'blog_title' => 'required',
            'blog_meta_description' => 'required',
            'article_blog_category_id' => 'required',
            'blog_content' => 'required',
            'blog_article_writer_id' => 'required',
        ]);
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->blog_content);
        libxml_use_internal_errors(false);
        $imageFile = $dom->getElementsByTagName('img');
        if ($imageFile->length > 0) {
            foreach ($imageFile as $item => $image) {

                $data = $image->getAttribute('src');

                list($type, $data) = explode(
                    ';',
                    $data
                );

                list(,
                    $data
                ) = explode(
                    ',',
                    $data
                );

                $imgeData = base64_decode($data);

                $image_name = "summernote/" . time() . $item . '.png';

                // $path = public_path() . $image_name;

                // file_put_contents($path, $imgeData);
                $path = 'public/' . $image_name; // Store in the 'public' disk

                Storage::put($path, $imgeData);

                $url = Storage::url($path);

                $image->removeAttribute('src');

                $image->setAttribute(
                    'src',
                    $url
                );
            }
        }
        $content = $dom->saveHTML();
        $entity = new BlogArticle();
        $entity->blog_title = $request->blog_title;
        $entity->custom_url = $request->custom_url;

        $entity->blog_image_path = FileHelper::Upload($request->banner_image, null, FileHelper::$articlebanner)->upload_name;
        $entity->blog_meta_description = $request->blog_meta_description;
        $entity->article_blog_category_id = $request->article_blog_category_id;
        $entity->blog_content = $content;
        $entity->blog_article_writer_id = $request->blog_article_writer_id;
        $entity->school_id = $request->school_id;
        // return $entity;
        $entity->save();

        return redirect()->back()->with('success', 'Blog Article Added');
    }

    public function article_update(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'custom_url' => 'required',
            'blog_meta_description' => 'required',
            'article_blog_category_id' => 'required',
            'blog_content' => 'required',
            'blog_article_writer_id' => 'required',
        ]);

        $base64Pattern = '/(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?/';
        if (preg_match($base64Pattern, $request->blog_content, $matches)) {
            // Store the first match in a variable (Base64 encoded)
            $base64Content = $matches[0];

            // Decode the Base64 content
            $decodedContent = base64_decode($base64Content);

            // Concatenate the original text with the decoded Base64 content
            // You can choose to remove the Base64 part if desired before concatenating
            $content = str_replace($base64Content, $decodedContent, $request->blog_content);

            // Display the concatenated result
            // echo "<h2>Original Text with Decoded Base64 Content:</h2>";
            // echo "<p>$result</p>";
        } else {
            $content = $request->blog_content;
        }
        $blog_details = BlogArticle::where('id', $request->blog_id)->first();
        $blog_details->blog_title = $request->blog_title;
        $blog_details->custom_url = $request->custom_url;
        $blog_details->blog_meta_description = $request->blog_meta_description;
        $blog_details->article_blog_category_id = $request->article_blog_category_id;
        $blog_details->school_id = $request->school_id;
        $blog_details->blog_content = $content;
        $blog_details->blog_article_writer_id = $request->blog_article_writer_id;
        $blog_details->status = $request->status;
        if ($request->banner_image) {
            $blog_details->blog_image_path = FileHelper::Upload($request->banner_image, $blog_details->banner_image, FileHelper::$articlebanner)->upload_name;
        }
        $blog_details->update($blog_details->toArray());

        return redirect()->back()->with('success', 'Blog Article Updated');
    }
}
