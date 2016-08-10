<?php

namespace App;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole{

    /**
     * @return Illuminate\Database\Eloquent\Model
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function permissions()
    {
        return $this->belongsToMany('Permission');
    }
}