<?php

use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;
use App\Permission;
use App\Student;
use App\Teacher;
use App\Collection;
use App\Subject;
use App\School;
use App\Qualitative;
use App\CaseModel;
use App\Team;
use App\OpenQuestion;


class Insertion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         *  Create Roles
         */
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $teacher = new Role();
        $teacher->name         = 'teacher';
        $teacher->display_name = 'Lærer'; // optional
        $teacher->description  = 'User is allowed to manage and view other users'; // optional
        $teacher->save();

        $student= new Role();
        $student->name         = 'student';
        $student->display_name = 'Elev'; // optional
        $student->description  = 'User is allowed to view itself.'; // optional
        $student->save();

        /**
         * Make Collections
         */

        $class = Collection::create([
            'class_initial' => 'asdakhdk',
            'level' => '5.b',
            'track' => '5.b',
        ]);
        $subject = Subject::create([
            'name' => 'Matematik',
        ]);
        $topic2 = Subject::create([
            'name' => 'Dansk',
        ]);

        $school = School::create([
            'name' => 'Realskolen',
            'town' => 'Haderslev',
            'postal' => '6100',
        ]);
        /**
         * Insert Users
         */

        $user = Teacher::create();
        $team = Team::create([
                'collection_id' => $class->id,
                'teacher_id' => $user->id,
                'subject_id' => $subject->id,
                'school_id' => $school->id,
        ]);
        $user = User::create([
            'name' => 'Mr. Teacher',
            'email' => 'teacher@copus.dk',
            'password' => bcrypt('123456'),
            'userable_id' => $user->id,
            'userable_type' => get_class($user),
            'school_id' => $school->id,
        ]);


        $user->attachRole($teacher);
   

        $user = Student::create();
        DB::table('collection_student')->insert(
            array(
                'collection_id' => $class->id,
                'student_id' => $user->id
            )
        );
        $user = User::create([
            'name' => 'Mr. Student',
            'email' => 'student@copus.dk',
            'password' => bcrypt('123456'),
            'userable_id' => $user->id,
            'userable_type' => get_class($user),
            'school_id' => $school->id,
        ]);

        $user->attachRole($student);



        /**
         * Make Permission
         */
        $createCase = new Permission();
        $createCase->name         = 'create-case';
        $createCase->display_name = 'Lave cases'; // optional

        $createCase->description  = 'Oprette nye cases.'; // optional
        $createCase->save();

        $readCase = new Permission();
        $readCase->name         = 'read-case';
        $readCase->display_name = 'Se cases'; // optional

        $readCase->description  = 'Se åbne cases.'; // optional
        $readCase->save();

        $teacher->attachPermission($createCase);


        $student->attachPermissions(array($readCase));

        /* Test evaluering*/
        $qual = Qualitative::create();

        CaseModel::create([
            'name' => 'Hello, World!',
            'active' => true,
            'team_id' => 1,
            'uniquecase_id' => $qual->id,
            'uniquecase_type' => get_class($qual),
        ]);
        OpenQuestion::create([
            'content' => 'Det har jeg lært',
        ]);
        OpenQuestion::create([
            'content' => 'Det har jeg svært ved',
        ]);
        OpenQuestion::create([
            'content' => 'Meningen med livet.',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
