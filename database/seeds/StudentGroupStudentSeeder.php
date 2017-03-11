<?php

use App\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\StudentGroup;
use DatabaseSeeder as Config;
class StudentGroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach(Student::all() as $student){
            $studentGroups  = StudentGroup::where('school_id', $student->school->id)->get()
                ->pluck('id')->toArray();

            DB::table('student_group_student')->insert([
                'student_id' => $student->id,
                'student_group_id' => $faker->randomElement($studentGroups),
            ]);
        }
    }
}
