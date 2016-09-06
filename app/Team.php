<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'collection_teacher_topic';


    public function cases(){
        return $this->belongsToMany('App\CaseModel');
    }
}
