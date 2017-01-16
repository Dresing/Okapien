<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('subjects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
        });

		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('subject_id')->unsigned();
			$table->string('class_initial');
			$table->string('level');
			$table->string('track');

			$table->softDeletes();
			$table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject')
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
        Schema::drop('subject');
		Schema::drop('courses');
	}

}
