<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpenQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->timestamps();
        });
        Schema::create('open_questions_qualitatives', function (Blueprint $table) {
            $table->integer('qualitative_id')->unsigned();
            $table->integer('open_question_id')->unsigned();

            $table->foreign('qualitative_id')->references('id')->on('qualitatives')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('open_question_id')->references('id')->on('open_questions')
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
        Schema::drop('open_questions');
    }
}
