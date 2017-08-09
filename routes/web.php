<?php

use \Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/test/form', function () {
	return view('collective');
});

Route::get('/gg', function () {
    return 'Just GG test';
});

Route::get('/test', function () {
	return view('test');
});

Route::get('/age', function () {
	echo 'GGG';
})->middleware('age:admin');

Route::resource('my','Test2Controller');

Route::post('/signup', [
	'uses' => 'UserController@postSignUp',
	'as' => 'signup',
]);

Route::post('/signin', [
	'uses' => 'UserController@postSignIn',
	'as' => 'signin',
]);

Route::get('/account', [
	'uses' => 'UserController@getAccount',
	'as' => 'account',
]);

Route::post('/accountupdate', [
	'uses' => 'UserController@postSaveAccount',
	'as' => 'account.save',
]);

Route::get('/userimage/{filename}', [
	'uses' => 'UserController@getUserImage',
	'as' => 'account.image',
]);

Route::get('/dashboard', [
	'uses' => 'PostController@getDashboard',
	'as' => 'dashboard',
	'middleware' => 'guest',
]);

Route::post('/createpost', [
	'uses' => 'PostController@postCreatePost',
	'as' => 'post.create',
	'middleware' => 'guest',
]);

Route::get('/delete-post/{post_id}', [
	'uses' => 'PostController@getDeletePost',
	'as' => 'post.delete',
	'middleware' => 'guest',
]);

Route::get('/logout', [
	'uses' => 'UserController@getLogout',
	'as' => 'logout',
]);

Route::post('/edit', [
	'uses' => 'PostController@postEditPost',
	'as' => 'edit',
]);

Route::post('/like', [
	'uses' => 'PostController@postLikePost',
	'as' => 'like',
]);
