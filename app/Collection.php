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

    public function students(){
        return $this->belongsToMany('App\Student');
    }

    public function teams(){
        return $this->hasMany('App\Team');
    }

}
