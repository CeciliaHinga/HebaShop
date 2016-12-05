<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;

use App\Type;

class ApiController extends Controller
{
	public function categoryDropDownData()
{

   $cat_id = Input::get('cat_id');


   $types = Type::where('category_id', '=', $cat_id)->orderBy('ads_type', 'asc')->get();

   return Response::json($types);


}
public function searchData()
{
	$type = Input::get('type');
	$advertisement = CategoryType::where('type_id','=',$type)->orderBy('id','DESC')->paginate(10);
   return Response::json($advertisement);

   //
}
}
