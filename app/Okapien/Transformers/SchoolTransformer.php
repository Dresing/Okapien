<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;



class SchoolTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($school){

        return [
            'id' => $school['id'],
            'name' => $school['name'],
            'town' => $school['town'],
            'postal' => $school['postal'],
        ];
    }
}