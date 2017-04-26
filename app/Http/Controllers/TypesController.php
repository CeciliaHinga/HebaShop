<?php

namespace App\Http\Controllers;

use App\CategoryType;

use App\Category;

use App\Type;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class TypesController extends Controller
{
 
    /**
    *Display a listing of the resource
    *
    *@param \App\Category $category
    *@return Response
    */
    public function index()
    {
        $user = User::first();
        $type = Type::first();
        $related = CategoryType::orderBy('id','desc')->paginate(15);
        $categories = CategoryType::paginate(15);
        $category = CategoryType::paginate(15);
        $categories = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
        $category = Category::join("types","types.category_id","=","categories.id")->paginate(15);

    	return view('types.index',compact('categories','users','category','related'));
    }
    /**
    *Show the form for creating a new resource
    *
    *@param \App\Category $category
    * @return Response
    */
    public function create(Category $category)
    {
    	return view('types.create',compact('category'));
    }
    /**
    *Store a newly created resource in storage
    *
    *@param \App\Category $category
    * @return Response
    */
    public function Store()
    {
    	//
    }
    /**
    *Display the specified resource
    *
    *@param \App\Category $category
    *@param \App\Type $type
    * @return Response
    */
    public function show($id)
    {
          $advertisement = Type::findOrFail($id);
        $related = CategoryType::orderBy('id','desc')->paginate(15);
        
       $categories = User::join("category_types","category_types.user_id","=","users.id")->where('category_types.type_id','=',$id)->paginate(15);
   	return view('types.show',compact('categories','advertisement','related'));
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\Category $category
    *@param \App\Type $type
    * @return Response
    */
    public function edit(Category $category, Type $type)
    {
    	return view('types.edit', compact('category', 'type'));
    }
    /**
    *Update the specified resource in storage
    *
    *@param \App\Category $category
    *@param \App\Type $type
    * @return Response
    */
    public function update(Category $category, Type $type)
    {
    	//
    }
    /**
    *Remove the specified category resource in storage
    *
    *@param \App\Category $category
    *@param \App\Type $type
    * @return Response
    */
    public function destroy(Category $category, Type $type)
    {
    	//
    }
}
