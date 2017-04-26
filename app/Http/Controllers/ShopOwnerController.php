<?php

namespace App\Http\Controllers;

use App\Permission;

use App\Role;

use App\CategoryType;

use Auth;

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
        $members = User::orderBy('id','ASC')->paginate(8);
        $sales = CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')->where('category_types.user_id','=',Auth::user()->id)->get();
    	return view('owner/index',compact('users','members','sales'));
    }
}
