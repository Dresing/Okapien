<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = "cases";
    protected $fillable = [
        'name', 'team_id' ,'uniquecase_id', 'uniquecase_type',
    ];
    
    /**
     * Get the model acosiated with the user e.g. Qualitative/Multiple
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function uniquecase()
    {
        return $this->morphTo();
    }

    /**
     * Find whether this instance is of a curtain type.php
     * 
     * @param $type The type to check against.
     * @return bool If there is a match in the type, true is returned. False otherwise.
     */
    public function is($type){
        if($this->uniquecase_type === "App\\".$type){
            return true;
        }
        return false;
    }

    /**
     * Get the case type.
     * @return string
     */
    public function type(){
        return str_replace("App\\", "", $this->uniquecase_type);
    }
}
