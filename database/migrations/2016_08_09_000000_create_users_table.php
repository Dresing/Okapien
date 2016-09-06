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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('userable_id');
            $table->string('userable_type');
            $table->rememberToken();
            $table->timestamps();
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
