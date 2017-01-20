<?php
namespace App\Traits;

use App\Courses;


use App\CourseAdministration;
use App\CourseStudents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

trait Courseable
{
    public function getCourses()
    {

        /**
         * Get courses and info for teacher
         *
         */
        if(auth::user()->hasRole('teacher')):
            $courses  = CourseAdministration::with(['CourseInfo' => function ($query) {
                $query->with('School');
                $query->with('Subject');
                $query->with('CourseStudents');
                $query->with(['CourseAdministration' => function ($query) {
                    $query->with('UserInfo');
                    }]);
                }])
                ->Where('user_id', Auth::user()->id)
                ->get();

            $data = $courses->sortBy('CourseInfo.level')->sortBy('CourseInfo.track');
            return $data;
        endif;

        /**
         * Get courses and info for student/guest
         *
         */
        $data = CourseStudents::with(['CourseInfo' => function ($query) {
            $query->with('School');
            $query->with('Subject');
            $query->with('CourseStudents');
            $query->with('CourseAdministration');
        }])
            ->Where('user_id', Auth::user()->id)
            ->get();

        return $data;
    }



    public function getCoursesTEST()
    {

        /**
         * Get courses and info for teacher
         *
         */
        if(auth::user()->hasRole('teacher')):
            $data  = Courses::with('FindMyCourseTeacher')
                ->with('School')
                ->with('Subject')
                ->with('CourseStudents')
                ->with('CourseAdministration')
                ->orderBy('level', 'desc')
                ->orderBy('track', 'desc')
                ->get();
            return $data;
        endif;

        /**
         * Get courses and info for student/guest
         *
         */
        $data  = Courses::with('FindMyCourse')
            ->with('School')
            ->with('Subject')
            ->with('CourseStudents')
            ->with('CourseAdministration')
            ->orderBy('level', 'desc')
            ->orderBy('track', 'desc')
            ->get();
        return $data;
    }
}