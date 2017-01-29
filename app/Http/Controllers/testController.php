<?php

namespace App\Http\Controllers;
use App\Okapien\API\Authentication\Privilege;
use App\Okapien\Transformers\TeamTransformer;
use App\Team;


class testController extends APIController{

    //Transformer for teams
    protected $teamTransformer;

    /**
     * testController constructor.
     * @param TeamTransformer $teamTransformer
     */
    public function __construct(TeamTransformer $teamTransformer)
    {
        $this->teamTransformer = $teamTransformer;
    }

    public function index(){

        //Run Authentication
       $authenticated = Privilege::check([
            'teacher' => []
        ]);

        //The user have the right authority and privilege to access
        if($authenticated){
            //Sets a limit on entries based on user input.
            $teams = Team::paginate($this->getLimit());

            //Send the paginated data as well as paginator object
            return $this->respondPagination(
                $this->teamTransformer->transformCollection(
                    $teams->all()), $teams);      
        }
        else{
            //Authentication failed
            return $this->respondUnauthorized();
        }
    }
    public function create(){
        //TODO Implement method
        abort(501);
    }
    public function store(){
        return "post";
    }
    public function show($obj){
        //TODO Implement method
        abort(501);
    }
    public function edit($obj){
        //TODO Implement method
        abort(501);
    }
    public function update($obj){
        //TODO Implement method
        abort(501);
    }
    public function destroy($obj){
        //TODO Implement method
        abort(501);
    }
}
