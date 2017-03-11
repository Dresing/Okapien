<?php

use App\School;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,Config::$size) as $index){
            School::create([
                'name' => $faker->company,
                'town' => $faker->city,
                'postal' => $faker->postcode,
            ]);
        }
        
    }
}
