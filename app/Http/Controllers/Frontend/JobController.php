<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function careers()
    {
        $all_job_posts = JobPost::where('status',1)->get();
        return view('frontend.careers',compact('all_job_posts'));
    }

    public function apply($id)
    {
        $job_details = JobPost::where('id',$id)->first();
        return view('frontend.careerapply',compact('job_details'));
    }
}
