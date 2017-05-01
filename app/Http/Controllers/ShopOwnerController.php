<?php

namespace App\Http\Controllers;

use App\Permission;

use App\Role;

use App\CategoryType;

use Auth;

use App\Shopping;

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
        // $query = 
        $customers = Shopping::join('role_user','role_user.user_id','=','shoppingcart.identifier')
        ->where('role_user.role_id',3)->get();
        $members = User::join('shoppingcart','shoppingcart.identifier','=','users.id')
        ->join('role_user','role_user.user_id','=','shoppingcart.identifier')
        ->join('category_types','category_types.id','=','shoppingcart.instance')
        ->orderBy('name','ASC')->paginate(8);
        $sales = CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')
        ->where('category_types.user_id','=',Auth::user()->id)->get();
        $users=CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')
        ->join('users','users.id','=','category_types.user_id')
        ->where('category_types.user_id','=',Auth::user()->id)->count();
    	return view('owner/index',compact('users','members','sales','customers'));
    }
    public function printorder()
    {
        $roles = Role::join('role_user','role_user.role_id','=','roles.id')->get();
        $users = User::find(Auth::user()->id);
        $members = User::join('shoppingcart','shoppingcart.identifier','=','users.id')
        ->join('category_types','category_types.id','=','shoppingcart.instance')
        ->where('category_types.user_id','=',Auth::user()->id)->orderBy('name','ASC')->paginate(8);
        $sales = CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')
        ->where('category_types.user_id','=',Auth::user()->id)->get();
        $userRole = $users->roles->lists('display_name','id')->toArray();

        return view('owner/orders',compact('members','sales','users','roles','userRole'));
    }
}
