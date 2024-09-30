<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogArticleWriter;
use Illuminate\Http\Request;
use Str;
class ArticleAuthorController extends Controller
{
    public function article_writer_add()
    {
        return view('admin.article.writer.add');
    }

    public function article_author_submit(Request $request)
    {
        $request->validate([
            'writer_name' => 'required',
            'writer_about' => 'required',
            'social_media' => 'required',
            'writer_description' => 'required',
        ]);

        $writer = new BlogArticleWriter();
        $writer->writer_name = $request->writer_name;
        $writer->slug = Str::slug($request->writer_name);
        $writer->writer_about = $request->writer_about;
        $writer->social_media = $request->social_media;
        $writer->writer_description = $request->writer_description;
        $writer->save();

        return redirect()->back()->with('success', 'Article Blog Writer Added Successfully');
    }

    public function article_writer_list()
    {
        $all_writers = BlogArticleWriter::all();
        return view('admin.article.writer.list', compact('all_writers')); 
    }

    public function article_writer_update(Request $request)
    {
        // return $request->all();
        $request->validate([
            'writer_id' => 'required',
            'writer_name' => 'required',
            'writer_about' => 'required',
            'social_media' => 'required',
            'writer_description' => 'required',
        ]);

        $writer_details = BlogArticleWriter::where('id', $request->writer_id)->first();
        $writer_details->writer_name = $request->writer_name;
        $writer_details->slug = Str::slug($request->writer_name);
        $writer_details->writer_about = $request->writer_about;
        $writer_details->social_media = $request->social_media;
        $writer_details->writer_description = $request->writer_description;
        $writer_details->update($writer_details->toArray());

        return redirect()->back()->with('success', 'Article Blog Writer Updated Successfully');
    }
}
