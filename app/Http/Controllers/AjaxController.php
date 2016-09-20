<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Qualitative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Team;

class AjaxController extends Controller
{
    public function addCase(Request $request){

        //If logged in user is a teacher.
        if(Auth::user()->is('Teacher')) {

            $teamId = $request->input('teamId');
            $team = Team::find($teamId);

            //See if we can compare
            ($team === null ) ? App::abort(500) : '';

            if($team->hasTeacher(Auth::user()->userable)) {
                $name = $request->input('name');
                $name = ($name == '' ? 'Ikke angivet' : $name);
                $status = Qualitative::createNew($name, $team->id);

                if ($status) {
                    return response()->json([
                        'status' => "success",
                        'test' => $request->input('date')
                    ]);
                }
            }
        }
        return response()->json([
            'status' => "fail",
            'message' => "Du har ikke rettigheder til denne handling."
        ]);
    }
}
