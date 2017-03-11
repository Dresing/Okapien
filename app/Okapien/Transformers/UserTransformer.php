<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;






use App\School;

class UserTransformer extends Transformer{


    /**
     * @param $team
     * @return array
     */
    public function transform($user){
        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'school' => (new SchoolTransformer())->transform(School::find($user['school_id']))
            
        ];
    }
}