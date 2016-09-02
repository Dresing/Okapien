<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     * Find whether the teacher teaches a collection based on an instance of collection and optionally a topic.
     *
     * @param Collection $collection the collection to inspect
     * @param Topic|null $topic Optional topic which to check if the teacher has this topic with the collection.
     * @return bool True if the teacher indeed teaches the collection, false if not.
     */
    public function teaches(Collection $collection, Topic $topic = null){
        if($topic === null) {
            if ($collection->teachers->contains($this->id)) {
                return true;
            } else {
                return false;
            }
        }
        else{
            if (Ownership::where('collection_id', $collection->id)
                    ->where('teacher_id', $this->id)->where('topic_id', $topic->id)->count() > 0) {
                    return true;
            }
            else {
                return false;
            }
        }

    }
}
