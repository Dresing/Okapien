<?php

use App\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
class StudentSeeder extends Seeder
{

    public $studentNum = 50;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,Config::random($this->studentNum)) as $index){
            Student::create([

            ]);
        }
    }
}
