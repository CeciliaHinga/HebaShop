<?php

namespace App\Http\Controllers\Auth;

use App\User;
<<<<<<< HEAD
use Auth;
use App\Permission;
use App\Role;
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $loginPath = '/login';
    //protected $advertPath = '/advertise';

    /**
<<<<<<< HEAD
     * Where to redirect users after login / registration.=
     *
     * @var string
     */
    //protected $redirectTo = "roles/create";
    protected $redirectAfterLogout = '/auth/login';

    
    public function redirectPath()
    {
        $redir_path;
        if (Auth::user()->hasRole('Admin')){
            return $redir_path = route('admin');
        }
        elseif (Auth::user()->hasRole('Shopkeeper')){
         return $redir_path = route('owners');
        }
        elseif (Auth::user()->hasRole('Customer')){
            return $redir_path = route('customers');
        }else{
        return $redir_path = 'roles/create';
    }   }

=======
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $redirectAfterLogout = '/auth/login';
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
<<<<<<< HEAD
            'roles' => 'required',
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
<<<<<<< HEAD
        return $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['roles'],
        ]);
        
    }
    public function showRegistrationForm()
    {

        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }
        $roles = Role::orderBy('id','DESC')->get();

        return view('auth.register', compact('roles'));
    }


=======
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
}
