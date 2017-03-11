<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;


use App\Subject;

class SubjectTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($subject){
        return [
            'id' => $subject['id'],
            'name' => $subject['name'],
        ];
    }
}