<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllLead;
use App\Models\SchoolLead;
use App\Models\SchoolNewApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolNewApplicationAdminController extends Controller
{
    public function school_application_new_leads()
    {
        $all_school_application_leads =
            SchoolNewApplication::select('application_date', DB::raw('count(id) as lead_count'))
            ->groupBy('application_date')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.enquiry.school-application-new-list', compact('all_school_application_leads'));
    }

    public function daywise_lead_list($day) 
    {
        $day_wise_leads = SchoolNewApplication::with('school', 'studentlead')->where('application_date', $day)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.enquiry.daywise_lead_list', compact('day_wise_leads'));
    }

    public function school_application_new_leads_by_school($application_id)
    { 
        $schoolLeads = SchoolLead::with('school.school_address')->join('all_leads', 'schools_leads.all_lead_id', '=', 'all_leads.id')
        ->join('school_new_applications', 'all_leads.phone', '=', 'school_new_applications.phone')
        ->where('school_new_applications.id', $application_id)
            ->select('schools_leads.*') // Ensure to select the desired columns
            ->get();
        return view('admin.enquiry.daily_auto_lead_transfer_list_school_wise', compact('schoolLeads'));
    }
}
