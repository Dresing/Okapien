<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




//Route::resource('app', 'testController');


/**
 * Routes for hold
 */
Route::group(['prefix' => 'v1',  'middleware' => 'auth:api'], function(){

    Route::group(['prefix' => 'student',  'middleware' => 'auth:api'], function(){

        Route::get('/list/{id}', [
            'uses' => 'StudentController@getStudentList',
        ]);
    });

    Route::get('/courses', [
        'uses' => 'CourseController@index',
    ]);
});


Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/test', function (Request $request) {
        return response()->json(['name' => 'test']);
    });
});