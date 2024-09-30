<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllEnquiryManual;
use Illuminate\Http\Request;

class AllEnquiryManuallyController extends Controller
{
    public function add()
    {
        return view('admin.allenquiry.add');
    }

    public function submit_number(Request $request)
    {
        $entity = new AllEnquiryManual();
        $entity->total_parent_enquiry = $request->total_parent_enquiry;
        $entity->total_parent_counselled = $request->total_parent_counselled;
        $entity->save();
        return redirect()->back()->with('success', 'Allenquiry manual added');
    }
}
