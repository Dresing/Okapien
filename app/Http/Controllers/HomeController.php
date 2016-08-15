<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\APIAuth;
use App\Collection;
use App\User;
use App\Role;
use App\Teacher;
use App\Student;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * If student is requesting
         */
        if (Auth::user()->is('Student')):
            return view('student.home', [
                'teachers' => User::all(), //Get all teachers
            ]);

        /**
         * If teacher is requesting
         */
        elseif (Auth::user()->is('Teacher')):
            return view('teacher.home', ['user' => Auth::user()]);

        endif;

        /**
         *  This should never occour unless an error is present. Send them to the login-page.
         */
        return view('auth.login');

    }
}
