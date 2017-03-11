<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;


use App\Okapien\Transformers\SubjectTransformer;
use App\School;
use App\StudentGroup;
use App\Subject;
use App\TeacherGroup;


class CourseTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($team){

        return [
            'id' => $team['id'],
            'student_group' => (new StudentGroupTransformer())->transform(StudentGroup::find($team['student_group_id'])),
            'teacher_group' => (new TeacherGroupTransformer())->transform(TeacherGroup::find($team['teacher_group_id'])),
            'subject' => (new SubjectTransformer())->transform(Subject::find($team['subject_id'])),
            'school' => (new SchoolTransformer())->transform(School::find($team['school_id'])),
        ];
    }
}