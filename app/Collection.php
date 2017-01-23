<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The class students and teachers attend.
 * @package App
 */
class Collection extends Model{

    protected $fillable = [
        'class_initial',
        'level',
        'track',

    ];

    public function students(){
        return $this->belongsToMany('App\Student');
    }

    public function teams(){
        return $this->hasMany('App\Team');
    }

}
