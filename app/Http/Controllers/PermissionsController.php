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

class PermissionsController extends Controller
{
    //
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
        $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('permissions.index',compact('permissions'))
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

        return view('permissions.create');
        
    }

    /**
    *Store a newly created permission in storage
    *
    *@param \App\User $user
    * @return Response
    */
    public function createPermission(Request $request){
     $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('roles.index')
                        ->with('success','Permission created successfully. Attach it to a permission');
    }
        public function show($id)
    {
        $permission = Permission::findOrFail($id);
        $rolePermissions = Role::join("permissions","permissions.id","=","roles.id")
            ->where("permissions.id",$id)
            ->get();

        return view('permissions.show',compact('permission','rolePermissions'));
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
        $permission = Permission::find($id);
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('permissions.edit',compact('permission','rolePermissions'));
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
        ]);

        $permission = Permission::find($id);
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();


        return redirect()->route('roles.index')
                        ->with('success','Permission updated successfully. Attach it to a permission');
    }    /**
    *Remove the specified user role in storage
    *
    *@param \App\User $user
    *@param \App\Role role
    * @return Response
    */
     public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Role deleted successfully');
    }
}
