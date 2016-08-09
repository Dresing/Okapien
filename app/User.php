<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{

    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Checks if the authenticated user has curtain role. If it is the case, true is returned. False otherwise.
     *
     * @param $role String the name of the role which the authenticated user is checked against.
     * @return bool whether the authenticated user indeed had that role.
     */
    public static function is($role){
        return Role::where('id', Auth::user()->role_id)->first()->name === $role ? true : false;
    }
}
