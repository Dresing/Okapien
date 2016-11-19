<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Routes for index
 */
Route::auth();
Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');

/**
 * Routes for cases
 */
Route::group(['prefix' => 'case', 'middleware' => ['auth']], function(){

    /**
     * Case handling
     */
    Route::group(['prefix' => 'kvalitativ'], function(){
        Route::get('/{case}', 'CaseController@qualitative');
    });
    Route::group(['prefix' => 'kvantitativ'], function(){
        Route::get('/{case}', 'CaseController@qualitative');

    });
});

/**
 * Routes for hold
 */
Route::group(['prefix' => 'hold', 'middleware' => ['auth']], function(){

    Route::get('/{team}', 'TeamController@teamProfile')->middleware('auth');

});

/**
 * Ajax Callse
 */
Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function(){

});


Route::get('feedme', function(){
	$key = '123';
	$secret = '321';
	echo '<a href="http://localhost/dev/public/api/v1/users?key='.$key.'&token='.hash_hmac("sha256", time() . $key, $secret) .'">test</a>';
});

/**
 * Routes for Ajax-calls (Behind the scene)
 */
Route::group(['prefix' => 'api', 'middleware' => ['auth']], function(){
	Route::get('/', function(){
	})->name('api');

	Route::get('/test', function(){
		return array('Observation', 'hyppighed', 'frekvens', 'kumuleret frekvens', 'Geometri', 'Aritmetik');
	});
	/**
	 * Case handling
	 */
	Route::group(['prefix' => 'case'], function(){
		Route::get('/', 'CaseController@getCases');
		Route::post('add', 'CaseController@addCase');
		Route::post('answer', 'CaseController@submitQualitative');
		Route::post('close', 'CaseController@closeCase');
		Route::get('questions', 'CaseController@getQuestions');
	});
	Route::group(['prefix' => 'collection'], function(){
		Route::get('students', 'CollectionController@getStudents');

	});
});

