<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\CategoryType;
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
        return view('index');
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
}
