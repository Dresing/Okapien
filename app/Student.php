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

    public function studentGroups(){
        return $this->belongsToMany('App\StudentGroup');

    }
    public static function courses(Student $student){

        $studentGroups = new StudentGroup();
        foreach($student->studentGroups as $c){
            $studentGroups = $c->studentGroups->merge($studentGroups);
        }
        return $studentGroups;
    }

    public function school(){
        return $this->user->belongsTo('App\School');
    }


}
