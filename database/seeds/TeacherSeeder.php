<?php

use App\Teacher;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
class TeacherSeeder extends Seeder
{

    public $teachersNum = 15;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,Config::random($this->teachersNum)) as $index){
            Teacher::create([

            ]);
        }
    }
}
