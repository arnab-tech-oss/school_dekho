<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SchoolContact;
use Illuminate\Http\Request;

class UnsubscribeController extends Controller
{
    public function unsubscribe($school_id)
    {
        $school_contact_details = SchoolContact::where('school_id', $school_id)->first();
        $school_contact_details->is_subscribe = 0;
        $school_contact_details->update($school_contact_details->toArray());
        return view('frontend.unsubscribe');
    }
}
