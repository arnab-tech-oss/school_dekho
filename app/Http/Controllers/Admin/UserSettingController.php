<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{
    public function user()
    {
        return view('admin.settings.user.add');
    }
    public function adduser(Request $request)
    {
       $user=new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       if($request->role=="admin")
       {
       $user->role='4';
       }elseif($request->role=="school_admin"){
       $user->role='2';
       }elseif ($request->role == "accountant") {
            $user->role = '7';
        }
       else{
       $user->role='5';
       }
       $user->save();
       return redirect()->back()->with('message','User Added Successfully');
    }
    public function listuser()
    {
        $listuser=User::where('role',4)->paginate(5);
        return view('admin.settings.user.listadmin',compact('listuser'));
    }
    public function approvestatus($id)
    {
        $user=User::find($id);
        $user->status="approved";
        $user->save();
        return back();
    }
    public function blockstatus($id)
    {
        $user=User::find($id);
        $user->status="blocked";
        $user->save();
        return back();
    }
    public function changepass()
    {
        return view('admin.changepassword');
    }
    public function changepassword(Request $request)
    {
        $entity=new User();
        if($request->pass_new==$request->pass_conf)
        {
            $entity->password=Hash::make($request->pass_new);
            $update=User::where('id',$request->id)->update(['password'=>$entity->password]);
            return redirect()->back()->with('message','your password has been changed successfully')->with('message_type','success');
        }
        else
        {
            return redirect()->back()->with('message','password and confirm passwords are incorrect')->with('message_type','danger');
        }
    }
    public function schooladminlist()
    {
        $listuser=User::where('role', 2)->paginate(5);
        return view('admin.settings.user.listschooladmin',compact('listuser'));
    }
}
