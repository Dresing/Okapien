<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('town');
            $table->string('postal');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('school_id')->unsigned();
            $table->integer('userable_id');
            $table->string('userable_type');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')
                ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->cascade();
        });
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('teachers');
        Schema::drop('students');
        Schema::drop('users');
    }
}
