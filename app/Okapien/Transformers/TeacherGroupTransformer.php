<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;



use App\School;
use App\TeacherGroupRelation;
use Illuminate\Support\Facades\DB;


class TeacherGroupTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($teacherGroup){
        return [
            'id' => $teacherGroup['id'],
            'teachers' => (new TeacherGroupRelationTransformer())->
                transformCollection($teacherGroup['TeacherGroupRelation']->toArray())
            ,
            'school' => (new SchoolTransformer())->
            transform($teacherGroup['school']),
        ];
    }
}