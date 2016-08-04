<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
    *Display a listing of the roles
    *
    *@param \App\User $user
    *@return Response
    */
    public function index(User $user)
    {
    	return view('roles.index',compact('user'));
    }
    /**
    *Show the form for creating a new resource
    *
    *@param \App\User $user
    * @return Response
    */
    public function create(User $user)
    {
    	return view('roles.create',compact('user'));
    }
    /**
    *Store a newly created user in storage
    *
    *@param \App\User $user
    * @return Response
    */
    public function Store()
    {
    	//
    }
    /**
    *Display the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
    public function show(User $user, Role $role)
    {
    	return view('roles.show',compact('user','role'));
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
    public function edit(User $user, Role $role)
    {
    	return view('roles.edit', compact('user', 'role'));
    }
    /**
    *Update the specified resource in storage
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
    public function update(User $user, Role $role)
    {
    	//
    }
    /**
    *Remove the specified user role in storage
    *
    *@param \App\User $user
    *@param \App\Role role
    * @return Response
    */
    public function destroy(User $user, Role $role)
    {
    	//
    }
}
