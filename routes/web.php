<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::post('/post', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::post('/post-update', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::get('/post-edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::get('/post-view', 'App\Http\Controllers\PostController@edit')->name('post.view');
Route::get('/post-delete', 'App\Http\Controllers\PostController@edit')->name('post.delete');


Route::get('/follow/{id}', 'App\Http\Controllers\FollowController@follow')->name('follow');
Route::get('/unfollow/{id}', 'App\Http\Controllers\FollowController@unfollow')->name('unfollow');

Route::post('/comment/{id}', 'App\Http\Controllers\CommentController@store')->name('comment.store');

Route::get('/post/{id}/like', 'App\Http\Controllers\LikeController@likePost')->name('likePost');
Route::get('/post/{id}/unlike', 'App\Http\Controllers\LikeController@unlikePost')->name('unlikePost');

Route::get('/comment/{id}/like', 'App\Http\Controllers\LikeController@likeComment')->name('likeComment');
Route::get('/comment/{id}/unlike', 'App\Http\Controllers\LikeController@unlikeComment')->name('unlikeComment');

Route::get('/search', 'App\Http\Controllers\ProfileController@search')->name('search');
Route::get('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::post('/profile/update-basic', 'App\Http\Controllers\ProfileController@basic')->name('update.basic');
Route::post('/profile/update-password', 'App\Http\Controllers\ProfileController@password')->name('update.password');
Route::get('/profile/{uname?}', 'App\Http\Controllers\ProfileController@index')->name('profile');

Route::get('/messages', 'App\Http\Controllers\MessageController@index')->name('message');
Route::get('/messages/{user_id}/create', 'App\Http\Controllers\MessageController@create')->name('message.create');
Route::post('/messages/{thread_id}/send', 'App\Http\Controllers\MessageController@store')->name('message.store');