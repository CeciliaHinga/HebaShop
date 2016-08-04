<?php

namespace App\Http\Controllers;

use App\Category;

use App\Type;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class TypesController extends Controller
{

    /**
    *Display a listing of the resource
    *
    *@param \App\Category $category
    *@return Response
    */
    public function index(Category $category)
    {
    	return view('types.index',compact('category'));
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
    public function show(Category $category, Type $type)
    {
    	return view('types.show',compact('category','type'));
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
