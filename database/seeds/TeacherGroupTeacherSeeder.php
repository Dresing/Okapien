<?php

use App\Teacher;
use App\TeacherGroup;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TeacherGroupTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach(Teacher::all() as $teacher){
            $teacherGroups  = TeacherGroup::where('school_id', $teacher->school->id)->get()
                ->pluck('id')->toArray();

            DB::table('teacher_group_teacher')->insert([
                'teacher_id' => $teacher->id,
                'teacher_group_id' => $faker->randomElement($teacherGroups),
            ]);
        }
    }
}
