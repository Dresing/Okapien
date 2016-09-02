<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ownership_id')->unsigned();
            $table->foreign('ownership_id')->references('id')->on('collection_teacher_topic')->cascade();
            $table->string('name');
            $table->integer('uniquecase_id');
            $table->string('uniquecase_type');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('qualitatives', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->cascade();
        });
        Schema::create('quantitatives', function (Blueprint $table) {
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
    public function down()
    {
        Schema::drop('qualitatives');
        Schema::drop('quantitatives');
        Schema::drop('cases');
    }
}
