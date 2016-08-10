<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\APIAuth;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Redirect;


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
        if(\Entrust::hasRole('student')):
            return view('studentHome', [
                'teachers' => Role::where('name', 'teacher')->first()->users()->get(), //Get all teachers
            ]);
        elseif(\Entrust::hasRole('teacher')):
            return view('studentHome', ['keys' => APIAuth::all(), 'users' => User::all()]);
        elseif(\Entrust::hasRole('admin')):
            return view('studentHome', ['keys' => APIAuth::all(), 'users' => User::all()]);
        endif;

        return view('welcome');

    }
}
