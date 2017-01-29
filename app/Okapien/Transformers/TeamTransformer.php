<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;


class TeamTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($team){
        return [
            'id' => $team['id'],
            'collection' => $team['collection_id'],
            'teacher' => $team['teacher_id'],
            'subject' => $team['subject_id'],
            'school' => $team['school_id'],
        ];
    }
}