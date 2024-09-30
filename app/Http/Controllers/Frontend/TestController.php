<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogTag;
use App\Models\BlogTagMap;
use Illuminate\Http\Request;

class TestController extends Controller
{




    public function test()
    {
        return view('as');
    }


}
