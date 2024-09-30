<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogLead;

class BlogLeadManageController extends Controller
{
    public function blog_lead_list()
    {
        $all_blog_leads = BlogLead::with('blog')->orderBy('id', 'desc')->paginate(10);
        return view('admin.blog.lead', compact('all_blog_leads'));
    }
}
