<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\CategoryType;

=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;
<<<<<<< HEAD

use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;


class CategoriesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
public function index()
{
    $categories = CategoryType::paginate(15);
	return view('categories.index',compact('categories'));
=======
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
public function index(Category $category)
{
	return view('categories.index',compact('category'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
}
public function create()
{ 
}
    /**
    *Store a newly created resource in storage
    *
    * @return Response
    */
<<<<<<< HEAD
    public function Store()
=======
    public function Store
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    {

    }
    /**
    *Display the specified resource
    *
    *@param \App\Category $category
    * @return Response
    */
<<<<<<< HEAD
    public function show($id)
    {
         $advertisement = Category::findOrFail($id);

        $categories = CategoryType::where('category_id','=',$id)->paginate(15);

        return view('categories.show',compact('categories', 'advertisement'));
=======
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
    }
    /**
    *Show the form for editing the specified resource
    *
    *@param \App\Category $category
    * @return Response
    */
    public function edit(category $category)
    {
<<<<<<< HEAD

=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
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
