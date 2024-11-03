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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');

Route::get('/search','UsersController@search')->middleware('auth');
Route::post('/search','UsersController@userSearch');

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

// 投稿機能
Route::post('/post/create','PostsController@store')->name('post.store')->middleware('auth');
Route::post('/post/update','PostsController@update')->middleware('auth');
Route::get('/post/{id}/delete','PostsController@delete')->middleware('auth');

Route::post('/users/{user}/follow', 'FollowsController@follow')->name('follow');
Route::post('/users/{user}/unfollow', 'FollowsController@unfollow')->name('unfollow');

Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile', 'UsersController@profile')->name('profile')->middleware('auth');
Route::post('/profile/update', 'UsersController@profileUpdate');
Route::get('/userprofile/{id}','UsersController@userProfile')->name('userprofile');
