<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CourseStudents extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'course_students';

	protected $fillable = [];


	/**
	 *
	 */
    public function CourseInfo(){
        return $this->belongsTo('App\Courses', 'course_id', 'id');
    }
    public function CourseStudents(){
        return $this->hasMany('App\CourseStudents', 'course_id', 'course_id');
    }
    public function CourseAdministration(){
        return $this->hasMany('App\CourseAdministration', 'course_id', 'id');
    }


}

