<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The class students and teachers attend.
 * @package App
 */
class StudentGroup extends Model{

    protected $table = 'student_groups';
    protected $fillable = [
        'class_initial',
        'level',
        'track',

    ];

    public function students(){
        return $this->belongsToMany('App\Student');
    }
    public function courses(){
        return $this->hasMany('App\Course');
    }
    public function studentGroupRelation(){
        return $this->hasMany('App\studentGroupRelation');
    }
    public function school(){
        return $this->belongsTo('App\School');
    }    
}
