<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Course;


class Teacher extends Model
{
    public $timestamps = false;
    protected $table = "teachers";
    protected $touches = array('User');


    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }


    public function courses(){

        dd(Course::with(['TeacherGroup'])->get());
    }
    public function teacherGroups(){
        return $this->belongsToMany('App\TeacherGroup', 'teacher_group_teacher');
    }
    public function school(){
        return $this->user->belongsTo('App\School');
    }


    /**
     * Find whether the teacher teaches a collection based on an instance of collection and optionally a topic.
     * @param StudentGroup $studentGroup
     * @param Subject|null $subject
     * @return bool
     */
    public function teaches(StudentGroup $studentGroup, Subject $subject = null){
        if($subject === null) {
            if ($studentGroup->teachers->contains($this->id)) {
                return true;
            } else {
                return false;
            }
        }
        else{
            if (Course::where('student_group_id', $studentGroup->id)
                    ->where('teacher_id', $this->id)->where('subject_id', $subject->id)->count() > 0) {
                    return true;
            }
            else {
                return false;
            }
        }
    }

    /**
     * Determines whether the teacher teaches a given student in any course.
     * @param Student $student
     * @return bool
     */
    public function teachesStudent($student){
        foreach($this->courses as $team){
            if($team->studentGroup->students->contains($student)){
                return true;
            }
        }
        return false;
    }

}
