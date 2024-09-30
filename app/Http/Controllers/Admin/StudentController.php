<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student_profile;
use App\Models\Student_query;
use App\Models\Schools;
use App\Exports\StudentsExport;
use App\Exports\WebsiteQueryExport;
use App\Models\StudentQuery;
use App\Models\StudentWebEnquiry;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students= User::students()->withcount('queries')->paginate(20);
        // dd($students);
        return view('admin.student.showall', compact('students'));    
    }

    public function view($id)
    {
        $student = User::students()->find($id);
        $profile = Student_profile::where('user_id', $id)->first();
        $queries = StudentQuery::where('user_id', $id)->with('school')->get();
        // dd($queries);
        return view('admin.student.show', compact('student', 'profile', 'queries'));
    }

    public function queryApprove($id)
    {
        $qury = Student_query::find($id);
        $qury->status = 'approved';
        $qury->save();
        return back()->with('success', 'Approved');
    }

    public function queryReject($id)
    {
        $qury = Student_query::find($id);
        $qury->status = 'rejected';
        $qury->save();
        // Student_query::update('status', 'rejected')->where('id', $id);
        return back()->with('error', 'Rejected');
    }

    public function allQueries()
    {
        $queries = Student_query::with('user','profile', 'school')->latest()->get();
        // dd($queries);
        //return $queries;
        return view('admin.student.queries', compact('queries'));
    }
    
    public function webQueries()
    {
        $web_queries = StudentWebEnquiry::paginate(20);
        return view('admin.student.website_query',compact('web_queries'));
    }

    public function webQueryDetails($id)
    {
        $student_details = StudentWebEnquiry::where('id',$id)->first();
        $student_details->update(['status' => '1']);
        return view('admin.student.details',compact('student_details'));
    }
    
    public function exportWebStudentQueries(Request $request)
    {
        return Excel::download(new WebsiteQueryExport($request),'website_query.xlsx');
    }
    
    public function downloadStudentQueries()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
