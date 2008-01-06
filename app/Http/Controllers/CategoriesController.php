<?php

namespace App\Http\Controllers;

use App\CategoryType;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;


class CategoriesController extends Controller
{
public function index()
{
    $categories = CategoryType::paginate(15);
	return view('categories.index',compact('categories'));
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

        $categories = CategoryType::where('category_id','=',$id)->paginate(15);

        return view('categories.show',compact('categories', 'advertisement'));
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
