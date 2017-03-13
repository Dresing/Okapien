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
     * @param $course
     * @return array
     */
    public function transform($course){

      //dd($course);

        return [
            'id' => $course['id'],
            'student_group' => (new StudentGroupTransformer())->transform($course['StudentGroup']),
            'teacher_group' => (new TeacherGroupTransformer())->transform($course['TeacherGroup']),
            'subject' => (new SubjectTransformer())->transform(Subject::find($course['Subject'])),
            'school' => (new SchoolTransformer())->transform(School::find($course['School'])),
        ];
    }
}