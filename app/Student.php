<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;
    protected $touches = array('User');

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
