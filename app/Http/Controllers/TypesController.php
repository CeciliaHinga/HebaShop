<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\CategoryType;

=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
use App\Category;

use App\Type;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class TypesController extends Controller
{
<<<<<<< HEAD
 public function __construct()
    {
        $this->middleware('auth');
    }
=======

>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    /**
    *Display a listing of the resource
    *
    *@param \App\Category $category
    *@return Response
    */
<<<<<<< HEAD
    public function index(Type $category)
    {
        //$categories = CategoryType::paginate(15);
    	return ("No such Page Exists");
=======
    public function index(Category $category)
    {
    	return view('types.index',compact('category'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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
<<<<<<< HEAD
    public function show($id)
    {
        $advertisement = Type::findOrFail($id);

        $categories = CategoryType::where('type_id','=',$id)->paginate(15);
    	return view('types.show',compact('categories','advertisement'));
=======
    public function show(Category $category, Type $type)
    {
    	return view('types.show',compact('category','type'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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
