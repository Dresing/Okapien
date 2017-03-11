<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;





use App\Student;

class StudentGroupRelationTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($studentGroupRelation){

        return [
            'student' => $student = (new StudentTransformer)->transform(Student::find($studentGroupRelation['student_id']))
            ,

        ];
    }
}