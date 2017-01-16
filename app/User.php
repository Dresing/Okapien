<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use LaratrustUserTrait, HasApiTokens, Notifiable;

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

    /**
     * Get the model acosiated with the user e.g. Teacher/Student
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function courses(){
        return $this->hasMany('App\CourseAdministration', 'user_id', 'id');
    }
}
