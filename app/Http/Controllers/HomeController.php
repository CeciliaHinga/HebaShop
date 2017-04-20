<?php

namespace App\Http\Controllers;
use App\User;
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
    $advertisement = CategoryType::orderBy('id','DESC')->paginate(15);
    $advertisement = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
            return View('/index',compact('advertisement','related'));

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
    $categories = CategoryType::paginate(15);
    $category = CategoryType::paginate(15);
    $categories = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
    $category = Category::join("types","types.category_id","=","categories.id")->paginate(15);
        return view('shops.show',compact('category','categories'));
    }
}
