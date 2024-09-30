<?php

namespace App\Http\Controllers\Admin;

use App\Core\BaseCore;
use App\Core\Helper;
use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\SchoolClaim;
use Illuminate\Support\Facades\Hash;

class SchoolDashboardController extends Controller
{
    public function add_dashboard()
    {
        $all_schools = School::with('school_address')->where('status',1)->get();
        return view('admin.school.add.dashboard', compact('all_schools'));
    }

    public function submit(Request $request)
    {
        $school_id = $request->school_id;
        $school = School::where('id', $school_id)->first();
        $school->is_verify = 1;
        $school->update($school->toArray());
        $user = new User();
        $user->name = $school->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();
        $school_claim = new SchoolClaim();
        $school_claim->school_id = $request->school_id;
        $school_claim->name = $request->name;
        $school_claim->designation = $request->claimer_designation;
        $school_claim->email = $request->email;
        $school_claim->phone = $request->phone;
        $school_claim->claim_id = $user->id;
        $school_claim->verify = "9";
        $school_claim->save();
        $payment = new Payment();
        $payment->payment_id = "pay_" . substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);
        $payment->school_id = $request->school_id;
        $payment->claim_id =  $user->id;
        $payment->school_claim_id = $school_claim->id;
        $payment->status = 1;
        $payment->amount = $request->amount;
        $payment->validated_at = $request->validation_date;
        $payment->save();
        return redirect()->back()->with('message', 'Dashboard Created Successfully');
    }
}
