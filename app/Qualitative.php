<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Qualitative extends Model
{
    public $timestamps = false;
    protected $table = "qualitatives";
    //protected $touches = array('CaseModel');


    /**
     * Creates two new instances in the databases to represent a case. It is done as a transaction
     * and thus if anything fails, all insertions are rolled back.
     * @param $name
     * @param $team
     * @return bool
     */
    public static function createNew($name, $team){
        try {
            $exception = DB::transaction(function () use( &$name, &$team){
                $case = self::create();
                CaseModel::create([
                    'name' => $name,
                    'team_id' => $team,
                    'uniquecase_id' => $case->id,
                    'uniquecase_type' => get_class($case),
                ]);
            });

            return is_null($exception) ? true : $exception;

        } catch(Exception $e) {
            return false;
        }

    }

    /**
     * Get the corresponding CaseModel for the instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function caseModel(){
        return $this->morphOne('App\CaseModel', 'uniquecase');
    }
}
