<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryType;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvertisesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		$categories = Category::orderBy('id', 'asc')->get();
		//$advertisement = Advertise::all();
		//$categories = Category::lists('name');
		//$types = Type::pluck('ads_type');
		//$query = DB::select('select $name from category');
		/*if ($categories == 'Appliances')
		{
			$types = Type::lists(array('ads_type'=>'Toys','Electronics'));
		}
		elseif ($categories == 'Real Estate')
		{
			$types = Type::lists(array('ads_type'=>'Mortgages','Land'));
		
		}*/
		
		return View('advertisement.index',compact('categories'));
	}
	public function create()
	{
		//$categories = Category::orderBy('name', 'asc')->get();
		
		//return View('advertisement.create',compact('categories'));
	}
    //Save advert to the db
    public function store(Request $request)
    {
    	$advertisement = new CategoryType(array('ads_title' => $request->get('ads_title'),'ads_category' => $request->get('ads_category'),'ads_type' => $request->get('ads_type'),'ads_content' => $request->get('ads_content')
    		));
    	$advertisement -> save();
    	$imageName = $advertisement->ads_title . '.' . $request->file('image')->getClientOriginalExtension();
    	$request->file('image')->move(base_path() . '/public/uploadedimage/', $imageName);
    	$advertisement = CategoryType::lists('ads_title');
    	return View('home', compact('advertisement'))->with('message', 'Advert added successfully!');
    }
    public function edit($id)
{

   $advertisement = CategoryType::findOrFail($id);

   return view('advertisement.edit', compact('advertisement'));
}
public function show($id)
{

   $advertisement = CategoryType::findOrFail($id);

   return view('advertisement.edit', compact('advertisement'));	
}

    
}
