<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Collection;
use Illuminate\Support\Facades\Input;

class CollectionController extends Controller
{
    public function getStudents(Request $request){

        $collectionId = (int) Input::get('collectionId');

        $collection = Collection::find($collectionId);

        if($collection != null){
            $data = [];
            foreach($collection->students as $student){
                $student_c = array_add($student, 'user', $student->user);
                $data[] = $student_c;
            }
            return response()->json([
                'status' => "success",
                'message' => "",
                'data' => $data
            ]);
        }


        return response()->json([
            'status' => "fail",
            'message' => "An error occurred.",
        ]);


    }
}
