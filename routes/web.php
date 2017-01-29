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

Route::resource('test', 'testController');


use Illuminate\Support\Facades\Log;
Route::get('/', function () {
    Log::info('homepage!');
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => 'api-test'], function(){

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', function(){
            abort(404);
        });
        Route::get('/{student}', 'StudentController@getCourses');
    });


});


/**
 * Routes for hold
 */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]);

    Route::group(['prefix' => 'evaluering',  'middleware' => 'auth'], function(){

        Route::get('/ny', 'EvaluationController@add');

        Route::get('/{id}-{course}-{level}-{track}/case', 'CourseController@cases');
    });


    Route::group(['prefix' => 'hold',  'middleware' => 'auth'], function(){

        Route::get('/{team}', 'TeamController@teamProfile')->middleware('auth');

        Route::get('/{team}-{course}-{level}-{track}', 'TeamController@teamProfile');

        Route::get('/{id}-{course}-{level}-{track}/case', 'CourseController@cases');
    });


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
    Route::get('/list/{id}', [
        'uses' => 'StudentController@getStudentList',
    ]);
});


