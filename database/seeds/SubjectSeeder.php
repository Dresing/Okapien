<?php

use App\Subject;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,4) as $index){
            Subject::create([
                'name' => $faker->word
            ]);
        }
    }
}
