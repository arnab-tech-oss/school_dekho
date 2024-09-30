<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student_query;
use App\Models\StudentQuery;

class QueryController extends Controller
{
    public function allQuery($id)
    {
      $queries=StudentQuery::with('school')->where('user_id',$id)->get();
      return view('student.queries',compact('queries'));
    }
}
