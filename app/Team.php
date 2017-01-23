<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'collection_teacher_subject';
    protected $fillable = [
        'collection_id', 'teacher_id', 'subject_id', 'school_id',
    ];
    public $timestamps = false;

    public function cases(){
        return $this->hasMany('App\CaseModel');
    }
    public function collection(){
        return $this->belongsTo('App\Collection');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    /**
     * Select a Team based on a Teacher, Student and Topic object.
     * @param Teacher $teacher
     * @param Collection $collection
     * @param Topic $topic
     */
   public static function determine(Teacher $teacher, Collection $collection, Topic $topic){
        //return Team::where('teacher_id', $teacher->id)->where('collection_id', $collection->id)->where('topic_id', $topic->id)->first();
        return Team::find(1);
   }

    /**
     * Determine if a teacher teaches this team.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function hasTeacher(Teacher $teacher){
        return ($this->teacher_id === $teacher->id ? true : false);
    }

}
