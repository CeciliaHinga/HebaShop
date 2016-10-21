<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD

use Zizaco\Entrust\Traits\EntrustUserTrait;
=======
//use Kodeine\Acl\Traits\HasRole;
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2


class User extends Authenticatable
{
<<<<<<< HEAD
    use EntrustUserTrait;
=======
    //use Authenticatable, CanResetPassword, HasRole;
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
