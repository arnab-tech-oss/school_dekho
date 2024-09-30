<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Models\SchoolClaim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolAddController extends Controller
{
    public function add()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.index', compact('total_schools'));
    }
    public function contact()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.contact', compact('total_schools'));
    }
    public function eligibility()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.eligibility', compact('total_schools'));
    }
    public function openinghour()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.openinghour', compact('total_schools'));
    }
    public function feesstructure()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.feesstructure', compact('total_schools'));
    }
    public function gallery()
    {
        $total_schools = SchoolClaim::where('claim_id', Auth::user()->id)->count();
        return view('school_admin_new.add.gallery', compact('total_schools'));
    }
}
