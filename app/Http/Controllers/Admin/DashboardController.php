<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_schools=School::count();
        $total_students=User::where('role',3)->count();
        $total_blogs=Blog::all()->count();
        $total_approved_schools=School::where('status',1)->count();
        $total_incomplete_school=School::where('status',0)
                                        ->where('is_complete',0)
                                        ->count();
        $total_complete_school=School::where('status',0)
                                     ->where('is_complete',1)
                                     ->count(); 
        return view('admin.dashboard',compact('total_schools','total_students','total_blogs','total_approved_schools','total_incomplete_school','total_complete_school'));
    }
    
}
