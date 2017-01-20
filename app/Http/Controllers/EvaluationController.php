<?php

namespace App\Http\Controllers;

use App\CourseAdministration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class EvaluationController extends Controller
{
    /**
     * EvaluationController constructor.
     *
     */
    public function __construct() {
        //$this->middleware('auth');
        //**$this->middleware('session.database', ['only' => ['index', 'invalidateSession']]);
    }

    public function add($id = null)
    {

        /**
         * If teacher is requesting
         */
        if (Auth::user()->hasRole('teacher')):

            $data['edit'] = false;
            $data['teacher'] = Auth::user();

            return view('app.teacher.evaluate.reflection', compact('data'));

        endif;

        /**
         * Entering without permission
         */
        return view('home');

    }

}



