<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\CategoryType;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $advertisement = CategoryType::orderBy('id','DESC')->paginate(5);
    $advertisement = User::join("category_types","category_types.user_id","=","users.id")->paginate(5);
            $related = CategoryType::count();

            return View('/index',compact('advertisement','related','slides'));

//        return view('index');
    }
    public function contact()
    {
        return View('/contact');
    }
    public function about()
    {
        return View('/aboutus');
    }
    public function shop($id)
    {
    $users = User::findOrFail($id);
    $categories = CategoryType::paginate(15);
    $category = User::join("category_types","category_types.user_id","=","users.id")->where("users.id","=",$id)->count();
    $categories = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
        $sales = CategoryType::join('shoppingcart','shoppingcart.instance','=','category_types.id')
        ->where('category_types.user_id','=',$id)->count();
        return view('shops.show',compact('category','categories','users','sales'));
    }
    public function shops()
    {
        // $roles = Role::join("role_user","role_user.role_id","=","roles.id")->get();
        $users = User::join("role_user","role_user.user_id","=","users.id")
        ->where('role_user.role_id','=',2)->orderBy('user_id','DESC')->paginate(10);
        $roles = Role::get();
        // $userRole = $users->roles->lists('display_name','id')->toArray();

        return view('shops.index',compact('roles','users','userRole'));        
    }
}
