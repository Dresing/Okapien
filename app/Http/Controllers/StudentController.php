<?php

namespace App\Http\Controllers;

use App\CourseStudents;
use App\CourseAdministration;
use App\Traits\Courseable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\Privilege;
use App;
use App\User;
use App\Student;
use App\Teacher;
class StudentController extends Controller
{
    use Courseable;

    /**
     * CourseController constructor.
     *
     */
    public function __construct() {
        //$this->middleware('auth');
        //**$this->middleware('session.database', ['only' => ['index', 'invalidateSession']]);
    }


    public function getStudentList($id)
    {
        /**
         * Giver listen af de studerende. Der skal på et tidspunkt bygges på, at der også hentes inforamtioner omkring deres progression osv.
         *
         */
        if(auth::user()->can('getExtendedStudentInfo')):
            $data  = CourseStudents::with('UserInfo')
                ->Where('course_id', $id)
                ->get();

            //$data = $courses->sortBy('CourseInfo.level')->sortBy('CourseInfo.track');
            return $data;
        endif;

        /**
         * Giver listen af de studerende på et course. Uden videre information.
         *
         */
        $data  = CourseStudents::with(['CourseInfo' => function ($query) {
            $query->with('UserInfo');
        }])
            ->Where('course_id', $id)
            ->get();

        return $data;
    }



    public function getCourses(Student $student){
        $id = $student->id;


       Privilege::check([
           'teacher' => [
               "teaches:$id|any",
           ],
           'student' => [
               "self:$id|require"
           ],
       ]);

        return Student::teams($student);
    }

}


