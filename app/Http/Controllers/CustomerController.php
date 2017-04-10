<?php

namespace App\Http\Controllers;

use App\User;

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
    	$user=User::count();
    	return view('customer/index',compact('user'));
    }
}
