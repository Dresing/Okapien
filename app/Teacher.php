<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
    protected $table = "teachers";
    protected $touches = array('User');


    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function topics(){
       return $this->belongsToMany('App\Topic', 'collection_teacher_topic');
    }

    public function collections(){
        return $this->belongsToMany('App\Collection', 'collection_teacher_topic');
    }
}
