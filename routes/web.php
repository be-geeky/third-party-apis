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

use App\Http\Resources\UserCollection;
use App\User;

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/search_repos', 'HomeController@search_repos')->name('search_repos');

// Route::get('/org_repos', 'HomeController@org_repos')->name('org_repos');

Route::get('/users', function () {
	$users = User::with('posts')->paginate(1);
	return new UserCollection($users);
});