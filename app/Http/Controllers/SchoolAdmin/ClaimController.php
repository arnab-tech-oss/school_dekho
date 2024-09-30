<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Models\School;
use App\Core\FileHelper;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ClaimController extends Controller
{
    public function claim($id)
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        $school = School::with('school_address')->where('id', $id)->first();
        return view('school_admin_new.claim.view', compact('school','total_schools'));
    }

    public function claim_submit(Request $request)
    {
        $x = $request->school_id;
        
        $claim = new SchoolClaim();
        $claim->school_id = $x;
        $claim->name = $request->name;
        $claim->designation = $request->designation;
        $claim->email = $request->email;
        $claim->phone = $request->phone;
        $claim->path = FileHelper::Upload($request->file)->upload_name;
        $claim->claim_id = Auth::user()->id;
        $claim->save();
        School::where('id', $x)->update(['is_claimed' => '1']);
        return redirect()->back()->with(['Claimed' => 'School Claim Successfully']);
    }
}
