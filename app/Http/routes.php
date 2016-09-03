<?php
use App\CategoryType;
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

Route::get('/', function () {
	$advertisement = CategoryType::paginate(10);
    		return view('index',compact('advertisement'));
});
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout', function(){
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
/*Route::controllers([
   'password' => 'Auth\PasswordController',
]);*/
// Provide controller methods with object instead of ID

Route::model('users', 'Users');
Route::model('roles', 'Roles');
Route::model('categories', 'Categories');
Route::model('types', 'types');

//use slugs rather than IDs in URLs
Route::bind('users', function($value, $route) {
	return App\User::whereSlug($value)->first();
});
Route::bind('roles', function($value, $route) {
	return App\Role::whereSlug($value)->first();
});
Route::bind('categories', function($value, $route) {
	return App\Category::whereSlug($value)->first();
});
Route::bind('types', function($value, $route) {
	return App\Types::whereSlug($value)->first();
});

Route::resource('users','UsersController');
Route::resource('users.roles','RolesController');
Route::resource('categories','CategoriesController');
Route::resource('categories.types','TypesController');


Route::auth();

//Route::get('index', 'HomeController@index');
Route::resource ('advertisement', 'AdvertisesController');
Route::get('api/category-dropdown', 'ApiController@categoryDropDownData');