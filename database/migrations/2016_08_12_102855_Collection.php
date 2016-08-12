<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class Collection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('collection_student', function (Blueprint $table) {
            $table->integer('collection_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('collection_id')->references('id')->on('collections')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['collection_id', 'student_id']);
        });
        Schema::create('collection_teacher', function (Blueprint $table) {
            $table->integer('collection_id')->unsigned();
            $table->integer('teacher_id')->unsigned();

            $table->foreign('collection_id')->references('id')->on('collections')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['collection_id', 'teacher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('collection_student');
        Schema::drop('collection_teacher');
        Schema::drop('collections');
    }
}
