<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;

use App\Permission;

use DB;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class RolesController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    *Display a listing of the roles
    *
    *@param \App\User $user
    *@return Response
    */
     public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
    *Show the form for creating a new resource
    *
    *@param \App\User $user
    * @return Response
    */
     public function create()
    {
        $roles = Role::orderBy('id','desc')->get();
        return view('roles.create',compact('roles'));
    }
    /**
    *Store a newly created user in storage
    *
    *@param \App\User $user
    * @return Response
    */
    public function assignRole(Request $request)
    {
        $this->validate($request, [
            'roles' => 'required',
        ]);
        $user = Auth::user();

        $role = Role::where('name', '=', $request->input('roles'))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);

        return redirect()->route('roles.show', compact('role'))
                        ->with('success','Role created successfully');
                            
    }
    /**
    *Display the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
     public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
    *Update the specified resource in storage
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
 public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }    /**
    *Remove the specified user role in storage
    *
    *@param \App\User $user
    *@param \App\Role role
    * @return Response
    */
     public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
