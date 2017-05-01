<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;

use App\CategoryType;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    //
//
    public function __construct()
    {
        $this->middleware('auth');
    }
    //v
    public function index()
    {
        $members = User::join('shoppingcart','shoppingcart.identifier','=','users.id')
        ->join('category_types','category_types.id','=','shoppingcart.instance')
        ->where('category_types.user_id','=',Auth::user()->id)->orderBy('name','ASC')->paginate(8);
        $sales = CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')
        ->where('category_types.user_id','=',Auth::user()->id)->get();
        $users = User::join("role_user","role_user.user_id","=","users.id")
        ->where('role_user.role_id','=',2)->orderBy('user_id','DESC')->paginate(8);
        $roles = Role::get();
    	return view('customer/index',compact('users','members','roles','sales'));
    }
}
