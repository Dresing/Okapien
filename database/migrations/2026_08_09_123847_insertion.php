<?php

use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;
use App\Permission;

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
         * Insert Users
         */
        $user = User::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@copus.dk',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole($admin);

        $user = User::create([
            'name' => 'Mr. Teacher',
            'email' => 'teacher@copus.dk',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole($teacher);

        $user = User::create([
            'name' => 'Mr. Student',
            'email' => 'student@copus.dk',
            'password' => bcrypt('123456'),
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
