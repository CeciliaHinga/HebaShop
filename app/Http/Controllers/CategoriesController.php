<?php

namespace App\Http\Controllers;

use App\CategoryType;

use App\Category;

use App\Type;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;


class CategoriesController extends Controller
{
public function index()
{
    $user = User::first();
    $type = Type::first();
    $categories = CategoryType::paginate(15);
    $related = CategoryType::orderBy('id','desc')->paginate(15);
    $category = CategoryType::paginate(15);
    $categories = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
    $category = Category::join("types","types.category_id","=","categories.id")->paginate(15);

	return view('categories.index',compact('categories','users','category','related'));
}
public function create()
{ 
}
    /**
    *Store a newly created resource in storage
    *
    * @return Response
    */
    public function Store()
    {

    }
    /**
    *Display the specified resource
    *
    *@param \App\Category $category
    * @return Response
    */
    public function show($id)
    {
         $advertisement = Category::findOrFail($id);
        $related = CategoryType::orderBy('id','desc')->paginate(15);
        
       $categories = User::join("category_types","category_types.user_id","=","users.id")->where('category_types.category_id','=',$id)->paginate(15);
        // $categories = CategoryType::orderBy('id','DESC')->paginate(15);


        return view('categories.show',compact('categories', 'advertisement','users','related'));
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\Category $category
    * @return Response
    */
    public function edit(category $category)
    {
        return view('categories.edit',compact('category'));
    }
    /**
    *Update the specified resource in storage
    *
    *@param \App\Category $category
    * @return Response
    */
    public function update(Category $category)
    {

    }
    /**
    *Remove the specified resource in storage
    *
    *@param \App\Category $category
    * @return Response
    */
    public function destroy(Category $category)
    {
        
    }
}
