<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class authcontroller extends Controller
{
    //
    public function githubredirect(Request $request){
        return Socialite ::driver('github')->redirect();
    }

    public function githubcallback(Request $request){
        $userdata = Socialite::driver('github')->user();
        $uuid=Str::uuid()->toString();
        //dd($user);
        // $user->token
        $user=User::where('email',$userdata->email)->where('auth_type','github')->first();
        if($user){
            //login
            Auth::login($user);
            return redirect('/admin/users');
        }
        else{
            //register
            $user=new User();
            $user->name=$userdata->name;
            $user->email=$userdata->email;
            $user->password=Hash::make($uuid.now());
            $user->email_verified_at=now();
            $user->auth_type='github';
            $user->save();
            Auth::login($user);
            return redirect('/admin/users');

        }
      
     }
}
