<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualitative extends Model
{
    public $timestamps = false;
    protected $table = "qualitatives";
    protected $touches = array('CaseModel');


    public function user()
    {
        return $this->morphOne('App\CaseModel', 'uniquecase');
    }
}
