<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;



use App\School;
use App\StudentGroupRelation;
use App\TeacherGroupRelation;
use Illuminate\Support\Facades\DB;


class StudentGroupTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($studentGroup){


        return [
            'id' => $studentGroup['id'],
            'students' => (new StudentGroupRelationTransformer())->
                transformCollection($studentGroup['StudentGroupRelation']->toArray())
            ,
            'school' => (new SchoolTransformer())->
            transform($studentGroup['school']),
        ];
    }
}