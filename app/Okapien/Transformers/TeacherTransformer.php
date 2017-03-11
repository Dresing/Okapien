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

class TeacherTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($teacher){
        return [
            'id' => $teacher['id'],
            'user' => (new UserTransformer())->transform($teacher->user->toArray()),

        ];
    }
}