<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Teacher;
use pp\Student;

class User extends Authenticatable
{

    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'userable_id', 'userable_type',
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
     * @return Illuminate\Database\Eloquent\Model
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Get the model acosiated with the user e.g. Teacher/Student
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Find whether the current logged-in user is af a curtain type.
     * @param $type The type to check against.
     * @return bool If the user is indeed of the request type, true is returned. False otherwise.
     */
    public function is($type){
        if($this->userable_type === "App\\".$type){
            return true;
        }
        return false;
    }

    /**
     * Get the user type.
     * @return string
     */
    public function type(){
        return str_replace("App\\", "", $this->userable_type);
    }
}
