<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\AllLead;
use Illuminate\Http\Request;

class AdmissionLeadController extends Controller
{
    public function admitted_leads()
    {
        $admitted_leads = AllLead::where('status', 5)->paginate(5);
        return view('lead.leads.admission', compact('admitted_leads'));
    }
}
