<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Exception;

class FacebookController extends Controller
{
    public function provider()
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function handleCallback()
    {
        try{
        $user = Socialite::driver('facebook')->stateless()->user();
        $this->createOrUpdateUser($user,'facebook');

        return redirect()->route('schools.index');
        } catch(Exception $e)
        {
           return redirect()->route('schools.index');
        }
    }

    private function createOrUpdateUser($data,$provider)
    {
       $user = User::where('email',$data->email)->first();

       if($user)
       {
        $user->login_panel = 'facebook';
        $user->update($user->toArray());
       }
       else{
           $user=User::create([
            'name'=> $data->name,
            'email'=> $data->email,
            'role'=> '3',
            'login_panel' => 'facebook'
           ]);

       }

       Auth::login($user);
    }
}
