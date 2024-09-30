<?php

namespace App\Http\Controllers\Student;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Core\FileHelper;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Student_profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentHistory;
use Illuminate\Support\Facades\Auth;

class StudentActivityController extends Controller
{
    public function changepass()
    {
        return view('student.changepassword');
    }
    public function changepassword(Request $request)
    {
        $student=new User();
        $student->id=$request->id;
        $student->password=Hash::make($request->pass_new);
        if($request->pass_new==$request->pass_conf)
        {
        $update=User::where('id',$request->id)->update(['password'=>$student->password]);
        return redirect()->back()->with('message','your password has been changed successfully')->with('message_type','success');
        }
        else
        {
            return redirect()->back()->with('message','your password and confirm password is not same')->with('message_type','danger');
        }
    }
    public function studentdetails($id)
    {   $user_id=Auth::user()->id;
        $studentdetails=User::where('id',$user_id)->first();
        $allstates=State::all();
        $alldistricts=District::all();
        $allcities=City::all();
        return view('student.details',compact('studentdetails','allstates','alldistricts','allcities'));
    }
    public function studentupdatedetails(Request $request)
    {  
        $student=Student_profile::where('user_id',$request->id)->first();
       // dd($request->name);
        $student->fname=$request->name;
        $student->adress_line_1=$request->adress_line_1;
        $student->adress_line_2=$request->adress_line_2;
        $student->city=$request->city;
        $student->district=$request->district;
        $student->state=$request->state;
        $student->pin=$request->pin;
        $student->phone=$request->phone;
        $upload=FileHelper::Upload($request->file,FileHelper::GetPathData($student->photo)->file_name,"storage/profile");
        if($upload->status){
            $student->photo=$upload->upload_name;
        }
        $student->update($student->toArray());
        return redirect()->back()->with('message','your profile has been updated successfully')->with('message_type','success');
    }
    public function studenthistory($id)
    {
       $history=StudentHistory::where('user_id',$id)->with('schools','schooldetails')->latest()->get();
       //return $history;
       return view('student.history',compact('history'));
    }
    
    public function lucky_draw_apply(Request $request)
    {
        return view('student.lucky_coupon');
    }
}
