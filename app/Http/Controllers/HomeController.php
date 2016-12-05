<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\CategoryType;
use Auth;

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
    $advertisement = CategoryType::orderBy('id','DESC')->paginate(10);
    $user = User::first();
    $users = User::join("category_types","category_types.user_id","=","users.id")->where('category_types.id','=',$user->id)->get();

            return View('/index',compact('advertisement','users','user'));

//        return view('index');
    }
}
