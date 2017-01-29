<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $touches = array('User');

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function collections(){
        return $this->belongsToMany('App\Collection');

    }
    public static function teams(Student $student){

        $teams = new Collection();
        foreach($student->collections as $c){
            $teams = $c->teams->merge($teams);
        }
        return $teams;
    }


}
