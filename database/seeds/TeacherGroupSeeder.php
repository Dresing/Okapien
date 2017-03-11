<?php

use App\School;
use App\Teacher;
use App\TeacherGroup;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
class TeacherGroupSeeder extends Seeder
{

    public $teacherGroupNum = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $schools = School::all()->pluck('id')->toArray();


        foreach(range(1,Config::random($this->teacherGroupNum)) as $index){
            TeacherGroup::create([
                'school_id' => $faker->randomElement($schools),
            ]);
        }

    }
}
