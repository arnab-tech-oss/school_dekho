<?php

namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryMap;
use App\Models\BlogTag;
use App\Models\BlogTagMap;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function bloglist()
    {
        $allblogs = Blog::orderBy('created_at', 'DESC')->paginate(100);
        return view('admin.blog.list', compact('allblogs'));
    }

    public function blogadd()
    {
        $allblogtags = BlogTag::all();
        $allblogcategories = BlogCategory::all();
        return view('admin.blog.add', compact('allblogtags', 'allblogcategories'));
    }

    public function blogaddnew(Request $request)
    {
        $exist_blog = Blog::where('title', $request->name)->first();
        if ($exist_blog) {
            return redirect()->back()->with('failure', 'Blog already exists');
        }
        $blog = new Blog();
        $blog->title = $request->name;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->approaximate_time = $request->approaximate_time;
        $blog->meta_description = $request->meta_description;
        $blog->blog_description = $request->blog_description;
        $blog->short_description = $request->short_description;
        $blog->alt_image = $request->alt_image;
        $blog->image_title = $request->image_title;
        $blog->view_count = 0;
        $blog->user_id = auth()->user()?->id;
        $upload = FileHelper::Upload($request->file);

        if ($upload->status) {
            $blog->image = $upload->upload_name;
        }
        $blog->save();
        $id = $blog->id;
        $title = str_replace(" ","-",$blog->title)."-".$id;
        if (str_contains($title, '?')) {
            $title = str_replace("?", "-", $title);
        }
        $school_slug = Blog::where('id',$id)->update(['slug'=>$title]);
        foreach ($request->blog_categories as $data) {
            $blog_category = new BlogCategoryMap();
            $blog_category->blog_id = $blog->id;
            $blog_category->blog_category_id = $data;
            $blog_category->save();
        }

        foreach ($request->blog_tags as $data) {
            $blog_tag = new BlogTagMap();
            $blog_tag->blog_id = $blog->id;
            $blog_tag->blog_tag_id = $data;
            $blog_tag->save();
        }
        return redirect()->back()->with('success', 'Blog  Added Successfully');
    }

    public function editblog($id)
    {
        $allblogtags = BlogTag::all();
        // $blogcategorylist=BlogCategoryMap::where('blog_id',$id)->get()->map(function($data){
        //     return $data->blog_category_id;
        // });

        $blog = Blog::where('id', $id)->first();

        
        $blog_category_maps = [];

        foreach ($blog->blog_category_maps as $x) {
            array_push($blog_category_maps, $x->blog_category_id);
        }

        unset($blog->blog_category_maps);

        $blog->blog_category_maps = $blog_category_maps;
        $allblogcategories = BlogCategory::all();

        $blog_tag_maps = [];
        foreach ($blog->blog_tag_maps as $x) {
            array_push($blog_tag_maps, $x->blog_tag_id);
        }

        unset($blog->blog_tag_maps);
        $blog->blog_tag_maps = $blog_tag_maps;
        $allblogtags = BlogTag::all();

        return view('admin.blog.edit', compact('allblogtags', 'allblogcategories', 'blog'));
    }

    public function updateblog(Request $request)
    {  
        $id = $request->id;
        $blog_details = Blog::where('id', $id)->first();
        $blog_details->title = $request->name;
        $blog_details->meta_keywords = $request->meta_keywords;
        $blog_details->meta_description = $request->meta_description;
        $blog_details->alt_image = $request->alt_image;
        $blog_details->image_title = $request->image_title;
        $blog_details->approaximate_time = $request->approaximate_time;
        $blog_details->user_id = auth()->user()?->id;
        $blog_details->blog_description = $request->blog_description;
        $blog_details->short_description = $request->short_description;
        $blog_details->is_active = $request->has('is_active');
        $upload = FileHelper::Upload($request->file, $blog_details->image);

        if ($upload->status) {
            $blog_details->image = $upload->upload_name;
        }

        BlogCategoryMap::where("blog_id", $blog_details->id)->delete();

        if (($request->blog_categories) && (sizeof($request->blog_categories) > 0)) {
            foreach ($request->blog_categories as $data) {
                $blog_category = new BlogCategoryMap();
                $blog_category->blog_id = $blog_details->id;
                $blog_category->blog_category_id = $data;
                $blog_category->save();
            }
        }

        BlogTagMap::where("blog_id", $blog_details->id)->delete();

        if (($request->blog_tags) && (sizeof($request->blog_tags) > 0)) {
            foreach ($request->blog_tags as $data) {
                $blog_tag = new BlogTagMap();
                $blog_tag->blog_id = $blog_details->id;
                $blog_tag->blog_tag_id = $data;
                $blog_tag->save();
            }
        }

        $blog_details->update($blog_details->toArray());
        return redirect()->back()->with('success', 'Blog  updated Successfully');
    }

    public function blogtaglist()
    {
        $allblogtags = BlogTag::all();
        return view('admin.blog.tag.list', compact('allblogtags'));
    }

    public function blogtagedit($id)
    {
       $blogtagdetails = BlogTag::where('id',$id)->first();
       return view('admin.blog.tag.edit', compact('blogtagdetails'));
    }

    public function blogtagupdate(Request $request)
    {
        $blogtagdetails = BlogTag::where('id',$request->id)->first();
        $blogtagdetails->name = $request->name;
        $blogtagdetails->is_active = $request->has('is_active');
        $blogtagdetails->update($blogtagdetails->toArray());
        return redirect()->back()->with('success', 'Blog  Tag updated Successfully');
    }

    public function blogtagadd()
    {
        return view('admin.blog.tag.add');
    }

    public function blogtagnew(Request $request)
    {
        $blogtag = new BlogTag();
        $blogtag->name = $request->name;
        $blogtag->save();
        return redirect()->back()->with('success', 'Blog Tag Added Successfully');
    }

    public function blogcategorylist()
    {
        $allblogcategories = BlogCategory::all();
        return view('admin.blog.category.list', compact('allblogcategories'));
    }

    public function blogcategoryadd()
    {
        return view('admin.blog.category.add');
    }

    public function blogcategorynew(Request $request)
    {
        $blogcategory = new BlogCategory();
        $blogcategory->name = $request->name;
        $blogcategory->save();
        return redirect()->back()->with('success', 'Blog Category Added Successfully');
    }

    public function blogcategoryedit($id)
    {
        $blogcategorydetails = BlogCategory::where('id',$id)->first();
        return view('admin.blog.category.edit', compact('blogcategorydetails'));
    }

    public function blogcategoryupdate(Request $request)
    {
        $blogcategorydetails = BlogCategory::where('id',$request->id)->first();
        $blogcategorydetails->name = $request->name;
        $blogcategorydetails->is_active = $request->has('is_active');
        $blogcategorydetails->update($blogcategorydetails->toArray());
        return redirect()->back()->with('success', 'Blog  Category updated Successfully');
    }
}
