<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class StudentGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('student_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->string('class_initial');
            $table->string('level');
            $table->string('track');
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools')
                ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('teacher_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools')
                ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('student_group_student', function (Blueprint $table) {
            $table->integer('student_group_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('student_group_id')->references('id')->on('student_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['student_group_id', 'student_id']);
        });
        Schema::create('teacher_group_teacher', function (Blueprint $table) {
            $table->integer('teacher_group_id')->unsigned();
            $table->integer('teacher_id')->unsigned();

            $table->foreign('teacher_group_id')->references('id')->on('teacher_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['teacher_group_id', 'teacher_id']);
        });
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_group_id')->unsigned();
            $table->integer('teacher_group_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('school_id')->unsigned();

            $table->foreign('student_group_id')->references('id')->on('student_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_group_id')->references('id')->on('teacher_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')
                ->onUpdate('cascade')->onDelete('cascade');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
