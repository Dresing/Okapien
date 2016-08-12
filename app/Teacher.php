<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
    protected $table = "teachers";
    protected $touches = array('User');


    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
