<?php

namespace App\Http\Controllers;

use App\Traits\Courseable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CourseController;

class HomeController extends Controller
{
    use Courseable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Henter alle Courses i forhold til om man er elev/lærer. Metoden bliver hentet i App\Traits\Courseable.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /**
         * If teacher is requesting
         */
        if (Auth::user()->hasRole('teacher')):

            $data['courses'] = $this->getCourses();
            $data['teacher'] = Auth::user();

            return view('app.teacher.home', compact('data'));

        endif;

        /**
         * If student is requesting
         */
        return view('app.student.home', [
                'student' => Auth::user(),
                'courses' => $this->getCourses(),
        ]);

    }
}
