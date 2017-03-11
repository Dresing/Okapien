<?php

use App\School;
use App\Student;
use App\StudentGroup;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
class StudentGroupSeeder extends Seeder
{

    public $studentGroupNum = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $schools = School::all()->pluck('id')->toArray();


        foreach(range(1,Config::random($this->studentGroupNum)) as $index){
            StudentGroup::create([
                'class_initial' => $faker->stateAbbr(),
                'level' => $index%10,
                'track' => $faker->randomLetter(),
                'school_id' => $faker->randomElement($schools),
            ]);
        }
    }
}
