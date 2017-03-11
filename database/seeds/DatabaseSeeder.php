<?php

use App\Course;
use App\School;
use App\Student;
use App\Teacher;
use App\TeacherGroup;
use App\User;
use App\Subject;
use App\StudentGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Size of the Dataset (Number of schools)
     */
    public static $size = 3;

    /**
     * When generating data, the number of insertion may vary by a factor. Such that schools
     * differ in size and shape.
     * Examples:
     * 0 = Constant data quantity. - All schools look the same in terms of size.
     * 0.5 = Quanity of data can swing up/down 50%
     * 1 = Quantity of data may vary from nothing to double the amount.
     * */
    public static $variation = 0.25; //0.25 is a good standard variation.

    /**
     *  Takes a standard number eg. amount of students for each schools and randomizes it slightly
     * within an interval given my the self:$variance. Used for testing.
     * @param $number
     * @return float
     */
    public static function random($number){
        return ceil(self::$size * $number *(mt_rand((1-self::$variation)*10,
                    (1+self::$variation)*10)/10));
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->truncateAll();
        //Start inserting new data
        $this->call('SchoolSeeder');
        $this->call('TeacherSeeder');
        $this->call('StudentSeeder');
        $this->call('UserSeeder');
        $this->call('SubjectSeeder');
        $this->call('TeacherGroupSeeder');
        $this->call('TeacherGroupTeacherSeeder');
        $this->call('StudentGroupSeeder');
        $this->call('StudentGroupStudentSeeder');
        $this->call('CourseSeeder');
    }

    private function truncateAll(){

        //Remove foreign key checks to avoid errors.
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Subject::truncate();
        User::truncate();
        Teacher::truncate();
        Student::truncate();
        School::truncate();
        TeacherGroup::truncate();
        DB::table('teacher_group_teacher')->truncate();
        StudentGroup::truncate();
        Course::truncate();
        DB::table('student_group_student')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Restore database foreign key check
    }
}
