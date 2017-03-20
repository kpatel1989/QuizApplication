<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/quiz/{testname}', 'Quiz\QuizController@getTest');
Route::get('/api/test/all', 'Quiz\QuizController@getTestList');

Route::post('/api/user/authenticate','User\UserController@login');
Route::post('/api/user/logout', 'User\UserController@logout');
Route::post('/api/user/register', 'User\UserController@register');
Route::post('/api/subscribe', 'User\UserController@subscribe');

Route::post('/api/user/{userid}', [
	'middleware' => 'user',
	'uses' => 'User\UserController@get'
]);

Route::post('/api/usertest/save','Quiz\QuizController@saveUserTest');

Route::put('/api/user/test/{testId}',[
	'middleware' => 'user',
	'uses' => 'Quiz\QuizController@updateUserTest'
]);

Route::get('/api/user/{userId}/tests',[
	'middleware' => 'user',
	'uses' => 'Quiz\QuizController@getUserTests'
]);
