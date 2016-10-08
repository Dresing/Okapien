<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $touches = array('User');


    public function teachers(){

    }

    public function teams(){
      //  return $this->belongsToManyThrough('App\Team', 'App\Collection');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function collections(){
        return $this->belongsToMany('App\Collection');
    }
}
