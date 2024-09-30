<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\StudentQuery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Student_profile;

class UserController extends Controller
{
    public function registerloginview()
    {
        return view('front.auth.loginregistartion');
    }
    public function schooladminsignup()
    {
        return view('user.auth.schooladminsignup');
    }
    public function addenquiry(Request $request)
    {
        $enquiry = new StudentQuery();
        $enquiry->user_id = Auth::user()->id;
        $enquiry->school_id = $request->school_id;
        $enquiry->question  = $request->question;
        $enquiry->message   = $request->message;
        $enquiry->phone     = $request->phone;
        $enquiry->save();
        return redirect()->back()->with(['message' => 'We will get back to you soon']);
    }
    public function signup(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $userdetails = User::where('email',$request->email)->first();
        if(isset($userdetails))
        {
            return redirect()->back()->with('email_message','Email address already exists');
        }
        $user->password = Hash::make($request->password);
        $user->role = '3';
        $user->save();
        $student_profile = new Student_profile();
        $student_profile->user_id = $user->id;
        $student_profile->fname = $user->name;
        $student_profile->save();
        Auth::login($user);
        return redirect()->route('schools.index');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // dd(auth()->user()->role);
            if (auth()->user()->role == "3") {
                return redirect()->route('schools.index');
            } elseif (auth()->user()->role == "1" || auth()->user()->role == "4") {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->role == "2") {
                return redirect()->route('schooladmin.dashboard');
            } elseif (auth()->user()->role == "5") {
                return redirect()->route('lead.dashboard');
            } elseif (auth()->user()->role == "6") {
                return redirect()->route('counselor.dashboard');
            } elseif (auth()->user()->role == "7") {
                return redirect()->route('account.dashboard');
            } elseif (auth()->user()->role == "8") {
                return redirect()->route('whatsapp.dashboard');
            } else {
                return redirect()->back()->with(['message' => 'Username or Password is wrong']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Username or Password is wrong']);
        }
    }
    public function logout()
    {
        Session::flush();
        // Auth::logout();
        return redirect()->route('schools.index');
    }
    public function schooladminregister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '2';
        $user->save();
        Auth::login($user);
        return redirect()->route('schools.index');
    }
}
