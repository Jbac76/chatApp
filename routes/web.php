<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/post', 'PostController@store')->name('post.store');
Route::post('/post-update', 'PostController@update')->name('post.update');
Route::get('/post-edit', 'PostController@edit')->name('post.edit');
Route::get('/post-view', 'PostController@edit')->name('post.view');
Route::get('/post-delete', 'PostController@edit')->name('post.delete');


Route::get('/follow/{id}', 'FollowController@follow')->name('follow');
Route::get('/unfollow/{id}', 'FollowController@unfollow')->name('unfollow');

Route::post('/comment/{id}', 'CommentController@store')->name('comment.store');

Route::get('/post/{id}/like', 'LikeController@likePost')->name('likePost');
Route::get('/post/{id}/unlike', 'LikeController@unlikePost')->name('unlikePost');

Route::get('/comment/{id}/like', 'LikeController@likeComment')->name('likeComment');
Route::get('/comment/{id}/unlike', 'LikeController@unlikeComment')->name('unlikeComment');

Route::get('/search', 'ProfileController@search')->name('search');
Route::get('/profile/update', 'ProfileController@update')->name('profile.update');
Route::post('/profile/update-basic', 'ProfileController@basic')->name('update.basic');
Route::post('/profile/update-password', 'ProfileController@password')->name('update.password');
Route::get('/profile/{uname?}', 'ProfileController@index')->name('profile');

Route::get('/messages', 'MessageController@index')->name('message');
Route::get('/messages/{user_id}/create', 'MessageController@create')->name('message.create');
Route::post('/messages/{thread_id}/send', 'MessageController@store')->name('message.store');