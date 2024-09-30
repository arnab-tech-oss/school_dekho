<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SchoolNewApplication;
use Illuminate\Http\Request;

class SchoolNewApplicationController extends Controller
{
    public function application_submit(Request $request)
    {
        // dd($request->all());
        $school_id = $request->school_id;
        $phone = $request->phone;
        $total_application_count = SchoolNewApplication::where('school_id', $school_id)->where('phone', $phone)->count();
        if ($total_application_count > 0) {
            return redirect()->back()->with('application_message', 'You have already applied for this school we will get back you soon');
        } else {
            $entity = new SchoolNewApplication(); 
            $entity->school_id = $request->school_id;
            $entity->name = $request->name;
            $entity->phone = $request->phone;
            $entity->application_date = date('Y-m-d');
            $entity->seeking_class = $request->seeking_class;
            $entity->school_type = $request->school_type;
            $entity->gender = $request->gender;
            $entity->save();
            return redirect()->back()->with('application_message', 'Application submitted successfully');
        }
    }

    public function application_form($id)
    {
        $index = "noindex";
        return view('frontend.testForm', compact('id', 'index'));
    }
}
