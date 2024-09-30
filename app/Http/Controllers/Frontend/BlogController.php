<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogTag;
use App\Models\BlogTagMap;
use App\Models\School;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function bloglist(Request $request)
    {
        $school_count = School::count();
        $blogcategories = BlogCategory::with('blog_categories')->get();
        // dd($blogcategories);
        $blogtags = BlogTag::all();
        $blogs = Blog::with('user')->where('is_active',1)->orderBy('id', 'DESC')->paginate(8);
        $popular_blogs = Blog::orderBy('view_count','DESC')->with('comment')->where('is_active',1)->limit(5)->get();
        if($request->title) {
            $title = $request->title; 
            if(Blog::where('title','like','%'.$title.'%')->count()>0)
            {
                $blogs=Blog::with('user')
                             ->where('is_active',1)
                             ->where('title','like','%'.$title.'%')
                             ->paginate(8);
                return view('frontend.blog-list', compact('blogcategories', 'blogtags','blogs','popular_blogs','title'));
            }
        }
        // return view('front.blog.list', compact('blogcategories','school_count' ,'blogtags','blogs','popular_blogs'));
        return view('frontend.blog-list', compact('popular_blogs', 'blogs', 'blogcategories', 'blogtags'));
    }

    public function blogdetails($slug)
    {
      if (str_contains($slug, ';src=sdkpreparse')) {
            $slug = str_replace(';src=sdkpreparse', '', $slug);
        }
        $school_count = School::count();
        $id=Blog::where('slug',$slug)->select('id')->get();
        if(sizeof($id)==0) { 
            return abort(404);
        }
        $id=$id[0]->id;
        $check_active_inative = Blog::where('id', $id)->first();
        if ($check_active_inative->is_active == 0) {
            return redirect()->route('schools.index');
        }
        $blogdetails = Blog::with('user')->where('id',$id)->first();
        $view_count = $blogdetails->view_count;
        $view_count = $view_count+1;
        $update = $blogdetails->update(['view_count' => $view_count]);
        $blogtags = BlogTagMap::with('blog_tag')->where('blog_id',$id)->get();
        $current_blog_id = Blog::find($id);
        $previous_blog_id = Blog::where('id','<',$current_blog_id->id)->where('is_active',1)->max('id');
        $previous_blog_slug = Blog::where('id',$previous_blog_id)->first();
        $previous_blog_slug = $previous_blog_slug?->slug;
        $next_blog_id = Blog::where('id','>',$current_blog_id->id)->where('is_active',1)->min('id');
        $next_blog_slug = Blog::where('id',$next_blog_id)->first();
        $next_blog_slug = $next_blog_slug?->slug;
        $blog_comments = BlogComment::where('blog_id',$id)->get();
        $previous_blog_details = Blog::with('user')->where('id', $previous_blog_id)->first();
        $next_blog_details = Blog::with('user')->where('id', $next_blog_id)->first();

        $latest_blogs = Blog::orderBy('view_count','DESC')->with('comment')->where('is_active',1)->latest()->limit(5)->get();
        $blogcategories = BlogCategory::with('blog_categories')->get();

        // return view('front.blog.details',compact('blogdetails','blogtags','previous_blog_details', 'next_blog_details','school_count','previous_blog_id','previous_blog_slug','next_blog_id','next_blog_slug','blog_comments','blogdetails'));
        return view('frontend.blog-details', compact('blogdetails', 'blog_comments', 'blogtags', 'latest_blogs', 'previous_blog_id', 'previous_blog_slug','next_blog_id','next_blog_slug', 'previous_blog_details', 'next_blog_details','blogcategories'));
    }

    public function blogcommentadd(Request $request)
    {
        $blogcomment = new BlogComment();
        $blogcomment->blog_id = $request->blog_id;
        $blogcomment->name = $request->name;
        $blogcomment->email = $request->email;
        $blogcomment->comment = $request->comment;
        $blogcomment->save();
        return redirect()->back();
    }

}
