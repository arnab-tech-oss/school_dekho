<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\SchoolClaimQuery;
use App\Http\Controllers\Controller;

class SchoolClaimQueryController extends Controller
{
    public function schoolclaimquery()
    {
        return view('front.school.schoolclaimquery');
    }
    public function newclaim(Request $request)
    {
        // return $request->all();
        $entity = new SchoolClaimQuery();
        $entity->school_name = $request->school_name;
        $entity->official_contact = $request->official_contact;
        $entity->official_email = $request->official_email;
        $entity->contact_person = $request->contact_person;
        $entity->designation = $request->designation;
        $entity->contact_number = $request->contact_number;
        $entity->email_id = $request->email_id;
        $entity->location = $request->location;
        $entity->status   = 0;
        $entity->save();
        return redirect()->back()->with(['contact_message' => 'We will get back you soon']);
    }
    public function newclaimregister(Request $request)
    {
        // return $request->all();
        $entity = new SchoolClaimQuery();
        $entity->school_name = $request->school_name;
        $entity->official_contact = $request->official_contact;
        $entity->official_email = $request->official_email;
        $entity->contact_person = $request->contact_person;
        $entity->designation = $request->designation;
        $entity->contact_number = $request->contact_number;
        $entity->email_id = $request->email_id;
        $entity->location = $request->location;
        $entity->status   = 0;
        $entity->school_claim = 1;
        $entity->save();
        return redirect()->back()->with(['contact_message' => 'We will get back you soon']);
    }
}
