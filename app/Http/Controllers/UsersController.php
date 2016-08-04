<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;

/**
* 
*/
class UsersController extends Controller
{
    
    public function index()
    {
        # code...
        #$users = User::all()
        #return view('users.index',compact('users'));
    }
    public function create()
    {
        return view('users.create');
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
{
return Redirect::intended('/index');
}
    }
    /**
    *Store a newly created user in storage
    *
    * @return Response
    */
    public function Store()
    {

    }
    /**
    *Display the specified user
    *
    *@param \App\User $user
    * @return Response
    */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    /**
    *Show the form for editing the specified user
    *
    *@param \App\User\ $user
    * @return Response
    */
    /**
    *Update the specified user in storage
    *
    *@param \App\User $user
    * @return Response
    */
    public function update(user $user)
    {

    }
    /**
    *Remove the specified user in storage
    *
    *@param \App\User $user
    * @return Response
    */
    public function destroy(User $user)
    {
        
    }
 
}