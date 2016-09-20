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


Route::auth();

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('klasse/{id}', 'CollectionController@collectionProfile')->middleware('auth');
Route::get('klasse/{id}/fag/{topicID}', 'CollectionController@TopicProfile')->middleware('auth');


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

	Route::get('/', function(){})->name('api');
	/**
	 * Case handling
	 */
	Route::group(['prefix' => 'case'], function(){
		Route::post('add', 'AjaxController@addCase');
	});

});

