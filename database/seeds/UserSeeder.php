<?php

use App\Student;
use App\Teacher;
use App\User;
use App\School;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $schools = School::all()->pluck('id');
        
        foreach(Teacher::all() as $user){
            User::create([
                'name' => $faker->unique->name,
                'email' => $faker->unique->email,
                'password' => bcrypt('123456'),
                'school_id' => $faker->randomElement($schools->all()),
                'userable_id' => $user->id,
                'userable_type' => get_class($user),
            ]);
        }
        foreach(Student::all() as $user){
            User::create([
                'name' => $faker->unique->name,
                'email' => $faker->unique->email,
                'password' => bcrypt('123456'),
                'school_id' => $faker->randomElement($schools->all()),
                'userable_id' => $user->id,
                'userable_type' => get_class($user),
            ]);
        }
    }
}
