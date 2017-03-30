<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
//use Kodeine\Acl\Traits\HasRole;


class User extends Authenticatable
{
    use EntrustUserTrait;
    //use Authenticatable, CanResetPassword, HasRole;

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
    public function advertisements()
    {
        return $this->hasMany('App\CategoryType');
    }

}
