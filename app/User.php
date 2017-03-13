<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'school_id', 'userable_id', 'userable_type'
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
     * Get the model acosiated with the user e.g. Teacher/Student
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function courses(){
        return $this->hasMany('App\CourseAdministration', 'user_id', 'id');
    }
     public function school(){
        return $this->belongsTo('App\School');
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
    public function isType($type){
        if(strcasecmp($this->userable_type,  "App\\".$type) == 0){
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
