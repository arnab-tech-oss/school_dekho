<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function job_add()
    {
        return view('admin.career.job_add');
    }

    public function add_job(Request $request)
    {
        $entity = new JobPost();
        $entity->job_title = $request->job_title;
        $entity->experince = $request->experince;
        $entity->working_hours = $request->working_hours;
        $entity->no_of_days = $request->no_of_days;
        $entity->job_description = $request->job_description;
        $entity->salary = $request->salary;
        $entity->save();
        return redirect()->back()->with('message','Job added successfully');
    }

    public function job_edit($id)
    {
        $job_details = JobPost::where('id',$id)->first();
        return view('admin.career.job_edit',compact('job_details'));
    }

    public function job_list()
    {
        $allJobs = JobPost::all();
        return view('admin.career.job_list',compact('allJobs'));
    }

    public function job_update(Request $request)
    {
        $job_details = JobPost::where('id',$request->job_id)->first();
        $job_details->job_title = $request->job_title;
        $job_details->experince = $request->experince;
        $job_details->working_hours = $request->working_hours;
        $job_details->no_of_days = $request->no_of_days;
        $job_details->job_description = $request->job_description;
        $job_details->salary = $request->salary;
        $job_details->status = $request->has('status');
        $job_details->update($job_details->toArray());

        return redirect()->back()->with('message','Job updated successfully');

    }

    public function all_applications()
    {
        $allApplications = JobApplication::with('job')->get();
        return view('admin.career.job_application_list',compact('allApplications'));
    }
}
