<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;

class GoogleController extends Controller
{
    public function provider()
    {
        return Socialite::driver('google')->redirect();

    }

    public function handleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $this->createOrUpdateUser($user,'google');

        return redirect()->route('schools.index');
    }

    private function createOrUpdateUser($data,$provider)
    {
       $user = User::where('email',$data->email)->first();
       if($user)
       {
        $user->login_panel = 'google';
        $user->update($user->toArray());
       }
       else{
           $user=User::create([
            'name'=> $data->name,
            'email'=> $data->email,
            'role'=> '3',
            'login_panel' => 'google'
           ]);

       }

       Auth::login($user);
    }
}
