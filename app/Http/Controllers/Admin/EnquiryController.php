<?php

namespace App\Http\Controllers\Admin;

use App\Models\SchoolApplicatrionForm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CounselorLead;
use App\Http\Controllers\Controller;
use App\Core\BaseController;
use App\Models\Front_query;
use App\Models\FrontCounsellorQuery;
use App\Models\School;

class EnquiryController extends BaseController
{
    public function enquiry_front_list()
    {
        $enquiries = Front_query::latest()->paginate(10);
        
        return view('admin.enquiry.front-list', compact('enquiries'));
    }
    
    public function enquiry_councillor_list()
    {
        $enquiries = FrontCounsellorQuery::with('stateDetails')->latest()->paginate(10);
        
        return view('admin.enquiry.counsellor-list', compact('enquiries'));
    } 

     public function school_applications()
    {
        $school_application_leads = SchoolApplicatrionForm::with('school.school_address')->orderBy('id', 'desc')->paginate(50);
        // return $school_application_leads;
        $all_schools = School::with('school_address')->where('status', 1)->get();
        return view('admin.lead.application', compact('school_application_leads', 'all_schools'));
    }
}
