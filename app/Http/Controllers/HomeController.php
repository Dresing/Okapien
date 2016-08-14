<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\APIAuth;
use App\User;
use App\Role;
use App\Teacher;
use App\Student;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is('Student')):
            return view('studentHome', [
                'teachers' => User::all(), //Get all teachers
            ]);
        elseif (Auth::user()->is('Teacher')):
            return view('teacherHome', ['user' => Auth::user()]);

        endif;
        return view('welcome');

    }
}
