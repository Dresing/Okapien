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
    public function topic()
    {
        return $this->belongsToMany('App\Topic', 'collection_teacher_topic');
    }

    public function students(){
        return $this->hasMany('App\Student');
    }
}
