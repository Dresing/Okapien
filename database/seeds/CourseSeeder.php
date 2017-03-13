<?php

use App\Course;
use App\School;
use App\Subject;
use App\TeacherGroup;
use App\StudentGroup;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DatabaseSeeder as Config;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public $coursesNum = 10;

    public function run()
    {
        $faker = Faker::create();
        $schools = School::all()->pluck('id');

        foreach(range(1,Config::random($this->coursesNum)) as $index){
            $school_id = $faker->randomElement($schools->all());
            Course::create([
                'student_group_id' => StudentGroup::where('school_id',$school_id)->inRandomOrder()->get()->first()->id,
                'teacher_group_id' => TeacherGroup::where('school_id',$school_id)->inRandomOrder()->get()->first()->id,
                'subject_id' => Subject::get()->random(1)->first()->id,
                'school_id' => $school_id,
            ]);
        }
    }
}
