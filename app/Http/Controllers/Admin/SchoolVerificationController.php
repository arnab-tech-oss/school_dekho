<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolVerificationController extends Controller
{
    public function verified_school_list()
    {
        $all_verified_school_list = School::with('school_address')->where('is_verify', 1)->paginate(10);
        return view('admin.school.verify.list',compact('all_verified_school_list'));

    }

    public function remove_verification($id)
    {
        $school_verify = School::where('id', $id)->first();
        $school_verify->is_verify = 0;
        $school_verify->update($school_verify->toArray());
        return redirect()->back();
    }

    public function verify_school($id)
    {
        $school_verify = School::where('id', $id)->first();
        $school_verify->is_verify = 1;
        $school_verify->update($school_verify->toArray());
        return redirect()->back();
    }
}
