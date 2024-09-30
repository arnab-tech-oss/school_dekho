<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SchoolPageLead;
use Illuminate\Http\Request;

class SchoolPageLeadController extends Controller
{
    public function submit_query(Request $request)
    {
        $entity = new SchoolPageLead();
        $entity->name = $request->name;
        $entity->phone = $request->phone;
        $entity->school_id = $request->school_id;
        $entity->class_seeking = $request->class_seeking;
        $entity->save();
        return redirect()->back()->with('page_lead_message', 'thanks for your query we will get back to you soon');
    }
}
