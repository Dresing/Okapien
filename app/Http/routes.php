<?php

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


/**
 * API Routes
 */
Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function(){
	Route::get('/', function(){
		return ['status' => 'Authorized'];
	});
	Route::get('users/{id?}', function($id = null){
		if($id == null) {
			return ['users' => App\User::all()];
		}
		else{
			return ['users' => App\User::where('id', $id)->get()];
		}
	});

});

Route::get('feedme', function(){
	$key = '123';
	$secret = '321';
	echo '<a href="http://localhost/dev/public/api/v1/users?key='.$key.'&token='.hash_hmac("sha256", time() . $key, $secret) .'">test</a>';
});

/**
 * Routes for Ajax-calls (Behind the scene)
 */
Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function(){

	/**
	 * For Teachers
	 */
	Route::group(['prefix' => 'teacher'], function(){
		Route::get('/', function(){return "hej";});
	});

	/**
	 * For Students
	 */
	Route::group(['prefix' => 'student'], function(){

	});
});

