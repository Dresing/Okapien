<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;




use App\Teacher;
use App\User;

class StudentTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($student){
        return [
            'id' => $student['id'],
            'user' => (new UserTransformer())->transform($student->user->toArray())

        ];
    }
}