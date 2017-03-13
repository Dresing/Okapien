<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;




use App\Teacher;

class TeacherGroupRelationTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($teacherGroupRelation){

        return [
            'teacher' => $teacher = (new TeacherTransformer)->transform($teacherGroupRelation['teacher'])
        ];
    }
}