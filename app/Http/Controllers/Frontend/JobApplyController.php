<?php

namespace App\Http\Controllers\Frontend;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function apply(Request $request)
    {
        $entity = new JobApplication();
        $entity->job_id = $request->job_id;
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->phone = $request->phone;
        $entity->address = $request->address;
        $entity->resume = FileHelper::Upload($request->resume,FileHelper::$resume)->upload_name;
        $entity->save();
        return redirect()->back()->with('job_message','Applied successfully');
    }
}
