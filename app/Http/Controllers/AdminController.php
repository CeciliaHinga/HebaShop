<?php

namespace App\Http\Controllers;


use App\Permission;

use App\Role;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    //v
    public function index()
    {
    	$users=User::count();
        $members = User::orderBy('id','asc')->paginate(8);
        $role=Role::join("role_user","role_user.role_id","=","roles.id")->where('role_user.role_id','=',2)->count();
    	return view('admin/index',compact('users','role','members'));
    }
}
