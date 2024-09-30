<?php

namespace App\Http\Controllers\Admin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\MouSchool;
use App\Models\School;
use Illuminate\Http\Request;

class MouController extends Controller
{
    public function list()
    {
        $mou_schools = School::with('address')->where('is_mou', 1)->paginate(10);
        return view('admin.mou.list', compact('mou_schools'));
    }

    public function add()
    {
        $all_schools = School::with('school_address')->where('is_mou', 0)->get();
        return view('admin.mou.add', compact('all_schools'));
    }

    public function mou_add()
    {
        $all_schools = School::with('school_address')->where('is_mou', 0)->get();
        return view('admin.mou.free_add', compact('all_schools'));
    }

    public function details($id)
    {
        $file_path = MouSchool::where('school_id', $id)->first();
        $path = "app/public/mou/" . $file_path->document;

        return response()->file(storage_path($path));
    }
    public function free_details($id)
    {
        $file_path = MouSchool::where('school_id', $id)->first();
        $path = "app/public/consent/" . $file_path->document_consent;

        return response()->file(storage_path($path));
    }

    public function submit(Request $request)
    {
        $entity = new MouSchool();
        $entity->school_id = $request->school_id;
        $entity->document  = FileHelper::Upload($request->document, null, FileHelper::$mou)->upload_name;
        $entity->save();
        $schooldetails = School::where('id', $request->school_id)->first();
        $schooldetails->is_mou = 1;
        $schooldetails->update($schooldetails->toArray());
        return redirect()->back()->with('success', 'Mou added successfully');
    }

     public function edit($id)
    {
        $mou_school = School::where('id', $id)->first();
        return view('admin.mou.edit', compact('mou_school'));
    }

    public function free_add_submit(Request $request)
    {
        $entity = new MouSchool();
        $entity->school_id = $request->school_id;
        $entity->document_consent = FileHelper::Upload($request->document, null, FileHelper::$consent_document)->upload_name;
        $entity->save();
        $schooldetails = School::where('id', $request->school_id)->first();
        $schooldetails->is_mou = 2;
        $schooldetails->update($schooldetails->toArray());
        return redirect()->back()->with('success', 'Consent added successfully');
    }

    public function free_mou_school_list()
    {
        $free_mou_schools = School::where('is_mou', 2)->paginate(10);
        return view('admin.mou.free_list', compact('free_mou_schools'));
    }

    public function upgrade_mou($id)
    {
        $schooldetails = School::where('id', $id)->first();
        $schooldetails->is_mou = 1;
        $schooldetails->update($schooldetails->toArray());
        return redirect()->back()->with('success', 'School upgraded successfully');
    }

    public function update(Request $request)
    {
        $mou_school_details = School::where('id', $request->id)->first();

        if ($request->mou_active == "on") {
            $mou_school_details->is_mou = 1;
            $mou_school_details->update($mou_school_details->toArray());
        } else {
            $mou_school_details->is_mou = 0;
            $mou_school_details->update($mou_school_details->toArray());
        }

        return redirect()->back()->with('success', 'Mou updated Successfully');
    }
}
