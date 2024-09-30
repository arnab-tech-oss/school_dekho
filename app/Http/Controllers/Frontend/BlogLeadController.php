<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogLead;
use Illuminate\Http\Request;

class BlogLeadController extends Controller
{
    public function blog_lead_submit(Request $request)
    {
        $entity = new BlogLead();
        $entity->name = $request->name;
        $entity->phone = $request->phone;
        $entity->seeking_class = $request->seeking_class;
        $entity->blog_id = $request->blog_id;
        $entity->save();
        return redirect()->back()->with('blog_message', 'Lead Submitted Successfully');
    }
}
