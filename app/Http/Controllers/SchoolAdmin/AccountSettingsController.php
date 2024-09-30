<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Models\User;
use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AccountSettingsController extends Controller
{
    public function account_settings()
    {
        $user_id = Auth::user()->id;
        $account_details = SchoolClaim::where('claim_id', $user_id)->first();
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.account_settings', compact('account_details', 'total_schools'));
    }
    public function account_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $account_details = SchoolClaim::where('claim_id', $user_id)->first();
        $account_details->name = $request->name;
        $account_details->designation = $request->designation;
        $account_details->phone = $request->phone;
        $account_details->update($account_details->toArray());
        return redirect()->back()->with(['update_message' => 'Your profile has been updated successfully']);
    }
    public function reset_password()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.reset_password', compact('total_schools'));
    }
    public function password_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_details = User::where('id', $user_id)->first();
        $password = $user_details->password;
        if (Hash::check($request->password, $password)) {
            if ($request->new_password == $request->new_confirm_password) {
                $user_details->password = Hash::make($request->new_password);
                $user_details->update($user_details->toArray());
                return redirect()->back()->with(['password_updated' => 'password updated']);
            }
            return redirect()->back()->with(['password_not_same' => 'password_not_same']);
        } else {
            return redirect()->back()->with(['wrong_password' => 'wrong password']);
        }
    }
}
