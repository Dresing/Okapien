<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The class students and teachers attend.
 * @package App
 */
class Collection extends Model{

    protected $fillable = [
        'name'
    ];
    public function topics()
    {
        return $this->belongsToMany('App\Topic', 'collection_teacher_topic');
    }

    public function students(){
        return $this->belongsToMany('App\Student');
    }

    public function teachers(){
        return $this->belongsToMany('App\Teacher', 'collection_teacher_topic');
    }
}
