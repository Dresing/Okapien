<?php

namespace App\Http\Controllers;

use App\CaseModel;
use App\Qualitative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collection;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Team;


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


    public function getQuestions(Request $request){

        $caseId = (int) Input::get('caseId');
        $case = CaseModel::find($caseId);



        if(!empty($case)){
            $data = $case->uniquecase->questions;
        }else{
            $data= [];
        }

        return response()->json([
            'status' => "success",
            'message' => "",
            'data' => $data
        ]);

    }


    public function getCases(Request $request){
        //Defaults
        $take = 10; //How many records to take
        $skip = 0;  //From which record should the selection start
        $order = 'desc'; //Order of the records, preformed before selection.
        $active = true; //Should closed cases or open cases be displayed

        if(Input::has('take')){
            $take = (int) Input::get('take');
        }
        if(Input::has('skip')){
            $skip = (int) Input::get('skip');
        }
        if(Input::has('order')){
            $order = Input::get('order');
        }
        if(Input::has('active')){
            $active = (Input::get('active') === 'true');
        }


        if($active){
            $cases = CaseModel::where('active', 1)->orderBy('created_at', $order)->take($take)->skip($skip)->get();
        }
        else{
            $cases = CaseModel::where('active', 0)->orderBy('created_at', $order)->take($take)->skip($skip)->get();
        }

        $data = [];

        foreach($cases as $case){
            array_add($case, 'url', $case->uniquecase->getURL());
            $data[] = $case;
        }


        return response()->json([
            'status' => "success",
            'message' => "",
            'data' => $data
        ]);


    }
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
