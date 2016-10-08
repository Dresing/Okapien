<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Qualitative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Team;
use App\CaseModel;

class AjaxController extends Controller
{
    public function addCase(Request $request){
            $teamId = $request->input('teamId');
            $team = Team::find($teamId);

            //See if we can compare

            ($team === null ) ? App::abort(500) : '';

            //The teacher should teach this team in order to add a case
            if($team->hasTeacher(Auth::user()->userable)) {
                $name = $request->input('name');
                $name = ($name == '' ? 'Ikke angivet' : $name);
                $status = Qualitative::createNew($name, $team->id);

                if ($status) {
                    return response()->json([
                        'status' => "success",
                    ]);
                }
        }
        return response()->json([
            'status' => "fail",
            'message' => "Du har ikke rettigheder til denne handling."
        ]);
    }
    public function closeCase(Request $request){

        $caseId = $request->input('caseId');
        $case = CaseModel::find($caseId);

        if($case->team->hasTeacher(Auth::user()->userable)) {
            $case->close();
            return response()->json([
                'status' => "success",
                'message' => "Casen blev lukket."
            ]);
        }

        return response()->json([
            'status' => "fail",
            'message' => "Du har ikke rettigheder til denne handling."
        ]);
    }
}
