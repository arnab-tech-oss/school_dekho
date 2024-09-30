<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student_query;
use App\Models\StudentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {   $student_id = Auth::user()->id;
        $enquiries = Student_query::where('user_id',$student_id)->count();
        $views     = StudentHistory::where('user_id',$student_id)->sum('count');
        return view('student.dashboard',compact('enquiries','views'));
    }
}
