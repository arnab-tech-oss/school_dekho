<?php

namespace App\Http\Controllers\Lead;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function all_schools()
    {
    $school_dashboards = Payment::with('school.school_address')
            ->whereHas('school', function ($q) {
                $q->where('is_verify', 1);
            })
            ->orderBy('id', 'DESC')
            ->paginate(4);
        return view('lead.schooldashboard.list', compact('school_dashboards'));
    }
}
