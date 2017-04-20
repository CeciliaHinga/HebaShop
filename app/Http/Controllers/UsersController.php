<?php

namespace App\Http\Controllers;

use App\Permission;

use App\Role;

use App\User;

use Hash;

use Auth;

use DB;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

//use App\Http\Controllers\Auth;

use Illuminate\Pagination\Paginator;

/**
* 
*/
class UsersController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
      public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
         $roles = Role::lists('display_name','id');
        return view('users.create',compact('roles'));
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
{
return Redirect::intended('roles.create',compact('roles'));
    
    /*public function create()
    {
        return view('users.create');
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
{
return Redirect::intended('/index');
*/}
    }
    /**
    *Store a newly created user in storage
    *
    * @return Response
    */
public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'image'   => 'mimes:jpeg,jpg,png | max:2000',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        //define the image paths

         $destinationFolder = '/uploadedimage/Avatar/';
         $destinationThumbnail = '/uploadedimage/Avatar/thumbnails/';
         $destinationMobile = '/uploadedimage/avatar/mobile/';

         //assign the image paths to new model, so we can save them to DB
        $input->image_path = $destinationFolder;

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
   //parts of the image we will need

   $file = Input::file('image');

   $imageName = $user->name;
   $extension = $request->file('image')->getClientOriginalExtension();

   //create instance of image from temp upload

   $image = Image::make($file->getRealPath());

   //save image with thumbnail

   $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
       ->resize(160, 160)
       // ->greyscale()
       ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
     public function edit()
    {
        $users = User::find(Auth::user()->id);
    
        $roles = Role::lists('display_name','id');
        $userRole = $users->roles->lists('display_name','id')->toArray();

        return view('users.edit',compact('users','roles','userRole'));
    
    }
        /**
    *Display the specified user
    *
    *@param \App\User $user
    * @return Response
    */
    public function show($id)
    {
        $users = User::findOrfail($id);
        $roles = Role::lists('display_name','id');
        $userRole = $users->roles->lists('display_name','id')->toArray();

        return view('users.show',compact('users','roles','userRole'));
    
    }
    /**
    *Show the form for editing the specified user
    *
    *@param \App\User\ $user
    * @return Response
    */
    /**
    *Update the specified user in storage
    *
    *@param \App\User $user
    * @return Response
    */
     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'image'=>'required| mimes:jpeg,jpg,png | max:2000',
            'roles' => 'required'
                ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $users = User::find($id);
       $destinationFolder = '/uploadedimage/Avatar/';
       $destinationThumbnail = '/uploadedimage/Avatar/thumbnails/';
       $users->image_path = $destinationFolder;
       $users->image_extension = $request->file('image')->getClientOriginalExtension();


        $users->update($input);
   if ( ! empty(Input::file('image'))){

       $file = Input::file('image');

       $imageName = $users->name;
       $extension = $request->file('image')->getClientOriginalExtension();

       //create instance of image from temp upload
       $image = Image::make($file->getRealPath());

       //save image with thumbnail
       $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
           ->resize(60, 60)
           // ->greyscale()
           ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   }
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $users->attachRole($value);
        }

        return redirect()->route('users.show',$id)
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // $user = User::join("category_types","category_types.user_id","=","users.id")->where('category_types.user_id','=',$id);
   $thumbPath = $user->image_path.'thumbnails/';

   File::delete(public_path($user->image_path).
                            $user->name . '.' .
                            $user->image_extension);
   File::delete(public_path($thumbPath). 'thumb-' .
                            $user->name . '.' .
                            $user->image_extension);

    User::destroy($id);
   if (Auth::user()->hasRole('Admin')){
            return redirect()->route('users')
                        ->with('success','User deleted successfully');
        }
             return redirect()->route('auth.logout')
                        ->with('success','User deleted successfully');
    }
    /*public function createRole(Request $request){

        $role = new Role();
        $role->name = $request->input('name');
        $role->save();

        return response()->json("created");

    }
     public function createPermission(Request $request){

        $viewUsers = new Permission();
        $viewUsers->name = $request->input('name');
        $viewUsers->save();

        return response()->json("created");

    }*/
/*     public function assignRole(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();

        $role = Role::where('name', '=', $request->input('role'))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);

        return response()->json("created");
    } 
    public function attachPermission(Request $request){
        $role = Role::where('name', '=', $request->input('role'))->first();
        $permission = Permission::where('name', '=', $request->input('name'))->first();
        $role->attachPermission($permission);

        return response()->json("created");
    }*/
   }