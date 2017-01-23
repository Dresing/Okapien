<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpenAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qualitative_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('open_question_id')->unsigned();
            $table->string('content');
            $table->timestamps();

            $table->foreign('qualitative_id')->references('id')->on('qualitatives')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('open_question_id')->references('id')->on('open_answers')
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
        Schema::drop('open_answers');
    }
}
