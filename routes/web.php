<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');

    Route::get('/klasse/{id}-{course}-{level}-{track}', 'CourseController@index');

    Route::get('/klasse/{id}-{course}-{level}-{track}/case', 'CourseController@cases');

});



/**
 * Routes for hold
 */
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function(){

    Route::get('/', function (Request $request) {
        return $request->user();
    });
    Route::get('/courses', [
        'as' => 'courses',
        'uses' => 'CourseController@getCourse',
    ]);
});
