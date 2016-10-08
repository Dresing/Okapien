<?php

namespace App\Http\Controllers;

use App\CaseModel;
use App\Qualitative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collection;

use App\Http\Requests;

class CaseController extends Controller
{
    public function qualitative(Qualitative $case){

        if (Auth::user()->is('Teacher')):
            return view('teacher.open_qualitative', [
                'case' => $case->caseModel
            ]);
        elseif(Auth::user()->is('Student')):
            return view('student.qualitative_answer', [
                'case' => $case
            ]);
        endif;

        /**
         *  This should never occour unless an error is present. Send them to the login-page.
         */
        return view('auth.login');
    }
}
