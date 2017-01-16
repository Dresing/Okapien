<?php

namespace App\Http\Controllers;

use App\CourseAdministration;
use App\Traits\Courseable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class CourseController extends Controller
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

    public function index($id = null)
    {

        /**
         * If teacher is requesting
         */
        if (Auth::user()->hasRole('teacher')):

            $data['course'] = $this->getCourses()->Where('course_id', $id)->first();
            $data['teacher'] = Auth::user();

            return view('app.teacher.course', compact('data'));

        endif;

        /**
         * If student is requesting
         */
        return view('app.student.course', [
            'student' => Auth::user(),
            'courses' => $this->getCourses(),
        ]);

    }

    public function cases()
    {
        /**
         *
         *
         */

        return 'hej';
    }

    public function getCourse()
    {
        /**
         * TEST - kan slettes !
         * Henter alle Courses i forhold til om man er elev/lærer. Metoden bliver hentet i App\Traits\Courseable.
         *
         */

        return $this->getCourses();
    }

}



