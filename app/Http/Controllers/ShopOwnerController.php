<?php

namespace App\Http\Controllers;

use App\Permission;

use App\Role;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class ShopOwnerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //v
    public function index()
    {
    	$users=User::count();
    	return view('owner/index',compact('users'));
    }
}
