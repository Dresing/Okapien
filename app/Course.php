<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'student_group_id', 'teacher_group_id', 'subject_id', 'school_id',
    ];
    public $timestamps = false;

    public function cases(){
        return $this->hasMany('App\CaseModel');
    }
    public function studentGroup(){
        return $this->belongsTo('App\StudentGroup');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }



}
