<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Core\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolDetailsUpdateController extends Controller
{
    public function update_principal(Request $request)
    {
        $id = $request->id;
        $school_principal_details = School::where('id', $id)->first();
        $school_principal_details->principal_name = $request->principal_name;
        $school_principal_details->principal_desk = $request->principal_description;
        $school_principal_details->principal_pic = FileHelper::Upload($request->profile_photo, null, FileHelper::$principal)->upload_name;
        $school_principal_details->update($school_principal_details->toArray());
        return redirect()->back();
    }
    public function update_school_logo(Request $request)
    {
        // dd($request->all());
        $id = $request->school_id;
        // if(!$request->hasFile('logo_school'))
        // {
        //     return "hello";
        // }
        
        $school_details = School::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'logo_school' => 'required|image|dimensions:min_width=400,min_height=400',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $school_details->school_logo = FileHelper::Upload($request->logo_school, null, FileHelper::$logo_path)->upload_name;
            $school_details->update($school_details->toArray());
            return redirect()->back()->with('logo-message',"Logo Updated Successfully");
        }
    
    }
}
