<?php

namespace App\Http\Controllers;

use App\Okapien\Facades\Privilege;
use App\Okapien\Transformers\CourseTransformer;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Auth;


class testController extends APIController{


    //Transformer for teams
    protected $courseTransformer;

    /**
     * testController constructor.
     * @param courseTransformer $teamTransformer
     */
    public function __construct(CourseTransformer $courseTransformer)
    {
        $this->courseTransformer = $courseTransformer;
    }

    public function courses(){
        return User::find(1)->userable->courses;
    }

    public function index(){

        $userable = Auth::user()->userable;

        //Run Authentication
       $authenticated = Privilege::check([
            'student' => [],
            'teacher' => []
        ]);


        //The user have the right authority and privilege to access
        if($authenticated){

            //Sets a limit on entries based on user input. Eager-load some of the necesary components.
            //Depending on user-type, courses are selecting differently.
            $courses = Course::with(
                'StudentGroup.StudentGroupRelation.Student.User.School',
                'StudentGroup.School', 
                'TeacherGroup.TeacherGroupRelation.Teacher.User.School',
                'TeacherGroup.School',
                'Subject', 
                'School')->where(function($query) use ($userable) {

                    if(Auth::user()->isType('Teacher')){

                        $query->whereIn('teacher_group_id', $userable->teacherGroups);

                    }
                    elseif(Auth::user()->isType('Student')){

                        $query->whereIn('student_group_id', $userable->studentGroups);
                    }
                })->paginate($this->getLimit());


            //Send the paginated data as well as paginator object
            return $this->respondPagination(
                $this->courseTransformer->transformCollection(
                    $courses->all()), $courses);
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
        abort(501);
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
