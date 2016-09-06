<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $touches = array('User');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function collections(){
        return $this->belongsToMany('Collection');
    }
}
