<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Courses extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Courses';

	protected $fillable = ['hold_nr', 'fag', 'niveau', 'year', 'hours', 'type', 'fu', 'arbejdsplan_id', 'course_id'];

    public function School(){
        return $this->belongsTo('App\School', 'school_id', 'id');
    }
    public function Subject(){
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
    public function CourseStudents(){
        return $this->hasMany('App\CourseStudents', 'course_id', 'id');
    }
    public function CourseAdministration(){
        return $this->hasMany('App\CourseAdministration', 'course_id', 'id');
    }
    public function FindMyCourseTeacher(){
        return $this->hasMany('App\CourseAdministration', 'course_id', 'id')->Where('user_id', Auth::user()->id);
    }
    public function FindMyCourseStudent(){
        return $this->hasMany('App\CourseStudents', 'course_id', 'id')->Where('user_id', Auth::user()->id);
    }

	
}
