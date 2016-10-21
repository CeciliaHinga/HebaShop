<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;

<<<<<<< HEAD
use App\Permission;

use DB;

use Auth;

=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class RolesController extends Controller
{
<<<<<<< HEAD
        public function __construct()
    {
        $this->middleware('auth');
    }
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    /**
    *Display a listing of the roles
    *
    *@param \App\User $user
    *@return Response
    */
<<<<<<< HEAD
     public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
=======
    public function index(User $user)
    {
    	return view('roles.index',compact('user'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
    /**
    *Show the form for creating a new resource
    *
    *@param \App\User $user
    * @return Response
    */
<<<<<<< HEAD
     public function create()
    {
        $user = User::find(Auth::user()->id);
        $roles = Role::orderBy('id','desc')->get();
        return view('roles.create',compact('roles','user'));
        
    }

    public function newrole()
    {
         $permission = Permission::get();
         return view('roles.createrole',compact('permission'));
    }
    /**
    *Store a newly created role in storage
=======
    public function create(User $user)
    {
    	return view('roles.create',compact('user'));
    }
    /**
    *Store a newly created user in storage
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    *
    *@param \App\User $user
    * @return Response
    */
<<<<<<< HEAD
    public function createRole(Request $request){
     $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
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
                            
=======
    public function Store()
    {
    	//
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
    /**
    *Display the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
<<<<<<< HEAD
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
=======
    public function show(User $user, Role $role)
    {
    	return view('roles.show',compact('user','role'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
<<<<<<< HEAD
     public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

=======
    public function edit(User $user, Role $role)
    {
    	return view('roles.edit', compact('user', 'role'));
    }
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    /**
    *Update the specified resource in storage
    *
    *@param \App\User $user
    *@param \App\Role $role
    * @return Response
    */
<<<<<<< HEAD
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
=======
    public function update(User $user, Role $role)
    {
    	//
    }
    /**
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    *Remove the specified user role in storage
    *
    *@param \App\User $user
    *@param \App\Role role
    * @return Response
    */
<<<<<<< HEAD
     public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
=======
    public function destroy(User $user, Role $role)
    {
    	//
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
}
