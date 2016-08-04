<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
public function index(Category $category)
{
	return view('categories.index',compact('category'));
}
   public function create()
    {
        return view('categories.create');
    }
    /**
    *Store a newly created resource in storage
    *
    * @return Response
    */
    public function Store
    {

    }
    /**
    *Display the specified resource
    *
    *@param \App\Category $category
    * @return Response
    */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
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
