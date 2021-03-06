<?php
use Illuminate\Support\Facades\Input;
use App\User;
use App\CategoryType;
use App\Category;
use Illuminate\Pagination\Paginator;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', ['as' => 'search', 'uses' => function(){
	if($query = Input::get('query',false))
	{
		// $advertisement = User::search($query)->paginate(15);
		$advertisement = CategoryType::search($query)->paginate(15);
		$advertisement = User::join("category_types","category_types.user_id","=","users.id")
		->where('name','LIKE', '%' . $query . '%')
		->orWhere('ads_title','LIKE', '%' . $query . '%')
		->orWhere('ads_content','LIKE', '%' . $query . '%')
		->orWhere('ads_image','LIKE', '%' . $query . '%')->paginate(15);
          $related = CategoryType::orderBy('id','desc')->paginate(15);
//		$advertisement = User::join("category_types","category_types.user_id","=","users.id")->search($query)->paginate(15);
    
	} else {
         // $related = CategoryType::count();
		$related = CategoryType::orderBy('id','desc')->paginate(15);
		$advertisement = User::join("category_types","category_types.user_id","=","users.id")->paginate(15);
    
	} 
	return View::make('/index', compact('advertisement','related'))
	->with('i', 0);
}]);
	Route::get('/contact','HomeController@contact');
	Route::get('/aboutus','HomeController@about');
/*Route::get('/', function () {
	$advertisement = CategoryType::all()->paginate(5);
    		return view('index',compact('advertisement'));
});*/
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/passwords/reset', 'Auth\PasswordController@reset');
Route::get('auth/logout', ['as' => 'auth.logout','uses' => 'Auth\AuthController@logout'], function(){
	return redirect($redirectAfterLogout);
});


//Route::post('auth/advertise', 'Auth\AuthController@postAdvert');
/*Route::get('/{current session id}/logout',function(){
    //TODO check if session id match with the session id parameter
    Auth::logout();
});*/

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');
/*Route::controllers([
   'password' => 'Auth\PasswordController',
]);*/
// Authentication route
Route::post('authenticate', 'Auth\AuthController@authenticate');
// Provide controller methods with object instead of ID

//Route::model('users', 'Users');
//Route::model('roles', 'Roles');
//Route::model('categories', 'Categories');
//Route::model('types', 'types');

//use slugs rather than IDs in URLs
/*Route::bind('users', function($value, $route) {
/*Route::controllers([
   'password' => 'Auth\PasswordController',
]);*/
// Provide controller methods with object instead of ID

//Route::model('users', 'Users');
//Route::model('roles', 'Roles');
//Route::model('categories', 'Categories');
//Route::model('types', 'types');
/*
//use slugs rather than IDs in URLs
Route::bind('users', function($value, $route) {
	return App\User::whereSlug($value)->first();
});
Route::bind('roles', function($value, $route) {
	return App\Role::whereSlug($value)->first();
});*/
//Route::bind('categories', function($value, $route) {
//	return App\Category::whereSlug($value)->first();
//});
//Route::bind('types', function($value, $route) {
//	return App\Types::whereSlug($value)->first();
//});
Route::resource('users.roles','RolesController');
Route::resource('categories','CategoriesController');
Route::resource('types','TypesController');
Route::get('shops/{id}',['as'=>'shops.show','uses'=>'HomeController@shop']);
Route::get('shops',['as'=>'shops.home','uses'=>'HomeController@shops']);

Route::auth();
Route::group(['middleware' => ['auth']], function() 
{	
Route::group(['prefix' => 'admin', 'middleware' => ['role:Admin']], function()
{
    Route::get('users',['as'=>'users','uses'=>'UsersController@index']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UsersController@edit']);
    Route::get('users/create',['as'=>'users.create','uses'=>'UsersController@create']);
    Route::post('users/create',['as'=>'users.store','uses'=>'UsersController@store']);
    Route::get('users/report',['as'=>'users.report','uses'=>'UsersController@report']);
    Route::get('/',['as'=>'admin','uses'=>'AdminController@index']);
	Route::get('roles/{role_id}',['as'=>'roles.show','uses'=>'RolesController@show']);
   // Route::resource('roles','RolesController');	
	Route::get('/roles',['as'=>'roles.index','uses'=>'RolesController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('/createrole',['as'=>'roles.newrole','uses'=>'RolesController@newrole','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::post('roles/createrole',['as'=>'roles.createrole','uses'=>'RolesController@createRole','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('permissions',['as'=>'permissions.index','uses'=>'PermissionsController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('permissions/create',['as'=>'permissions.create','uses'=>'PermissionsController@create','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::post('permissions/create',['as'=>'permissions.createpermission','uses'=>'PermissionsController@createPermission','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
});	
	
	/*Route::get('/',['as'=>'index','uses'=>'AdvertisesController@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);*/
	Route::group(['prefix' => 'owners', 'middleware' => ['role:Shopkeeper']], function()
	{
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UsersController@edit']);
	Route::get('/',['as'=>'owners','uses'=>'ShopOwnerController@index']);
	//
	Route::get('advertisement',['as'=>'advertise.ad','uses'=>'AdvertisesController@create']);
	Route::get('advertisement',['as'=>'advertisement.index','uses'=>'AdvertisesController@create','middleware' => ['permission:item-create']]);
	Route::post('advertisement',['as'=>'advertisement.store','uses'=>'AdvertisesController@store','middleware' => ['permission:item-create']]);
	Route::get('advertisement/{id}/edit',['as'=>'advertisement.edit','uses'=>'AdvertisesController@edit','middleware' => ['permission:item-edit']]);
	Route::patch('advertisement/{id}',['as'=>'advertisement.update','uses'=>'AdvertisesController@update','middleware' => ['permission:item-edit']]);
	Route::delete('advertisement/{id}',['as'=>'advertisement.destroy','uses'=>'AdvertisesController@destroy','middleware' => ['permission:item-delete']]);
	Route::get('/orders',['as' => 'orders.print','uses' => 'ShopOwnerController@printorder']);

});
	Route::group(['prefix' => 'customers', 'middleware' => ['role:Customer']], function()
	{
	Route::get('/',['as'=>'customers','uses'=>'CustomerController@index']);

});

	Route::get('users/{id}',['as'=>'users.show','uses'=>'UsersController@show']);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UsersController@update']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UsersController@edit','middleware' => ['permission:edit-profile']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UsersController@destroy']);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RolesController@create']);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RolesController@assignRole']);
    Route::get('roles/{role_id}',['as'=>'roles.show','uses'=>'RolesController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RolesController@edit','middleware' => ['permission:role-edit']]);
	Route::get('permissions/{permission_id}',['as'=>'permissions.show','uses'=>'PermissionsController@show']);
	Route::get('permissions/{id}/edit',['as'=>'permissions.edit','uses'=>'PermissionsController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RolesController@update','middleware' => ['permission:role-edit']]);
	Route::patch('permissions/{id}',['as'=>'permissions.update','uses'=>'PermissionsController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RolesController@destroy','middleware' => ['permission:role-delete']]);
	Route::delete('permissions/{id}',['as'=>'permissions.destroy','uses'=>'PermissionsController@destroy','middleware' => ['permission:role-delete']]);
	Route::get('advertisement/cart',['as'=>'advertisement.cart','uses'=>'AdvertisesController@cart','middleware' => ['permission:add-cart']]);
	Route::post('advertisement/cart',['as'=>'advertisement.cart','uses'=>'AdvertisesController@cart','middleware' => ['permission:add-cart']]);
    Route::get('/clear-cart', 'AdvertisesController@clear_cart');
    Route::delete('/cart-remove-item', 'AdvertisesController@cart_remove_item');
});

//Route::get('index', 'HomeController@index');
 Route::resource('advertisement', 'AdvertisesController');
Route::get('api/category-dropdown', 'ApiController@categoryDropDownData');
