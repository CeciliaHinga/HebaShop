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
    	$user=User::count();
        $role=Role::join("permissions","permissions.id","=","roles.id")->where('roles.id','=','2')->count();
    	return view('admin/index',compact('user','role'));
    }
}
