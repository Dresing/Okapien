<?php

use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;

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
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Adgang til alle funktioner.',
        ]);
        $teacher = Role::create([
            'name' => 'teacher',
            'display_name' => 'Lærer',
            'description' => 'Begrænset adgang og administration over elever.',
        ]);
        $student = Role::create([
            'name' => 'student',
            'display_name' => 'Elev',
            'description' => 'Begrænset adgang.',
        ]);
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
