<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Role;
use App\Http\Controllers\Controller;

use App\SocialAccountService;

use Socialite;

class SocialAuthController extends Controller
{
    //facebook
     public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

 public function callback(SocialAccountService $service, $provider)
    {
        $roles = Role::orderBy('id','desc')->get();
        $user = $service->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);
        $redir_path;
        if (Auth::user()->hasRole('Admin')){
            return redirect()->route('admin');
        }
        elseif (Auth::user()->hasRole('Shopkeeper')){
         return redirect()->route('owners');
        }
        elseif (Auth::user()->hasRole('Customer')){
            return redirect()->route('customers');
        }else{

        return redirect()-> route('roles.create',compact('roles'));
    }
}
}
