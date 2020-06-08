<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::get('/admin','AdminsController@index')->name('admin');

Route::get('/admin/posts','AdminsPostController@index')->name('admin.posts.index');
Route::get('/admin/posts/create','AdminsPostController@create')->name('admin.posts.create');
Route::post('/admin/posts','AdminsPostController@store')->name('admin.posts.store');
Route::get('/admin/posts/{post}','AdminsPostController@show')->name('admin.posts.show');
Route::get('/admin/posts/{post}/edit','AdminsPostController@edit')->name('admin.posts.edit');
Route::put('/admin/posts/{post}/update','AdminsPostController@update')->name('admin.posts.update');
Route::delete('/admin/posts/{post}/destroy','AdminsPostController@destroy')->name('admin.posts.destroy');

Route::get('/admin/users','AdminsUserController@index')->name('admin.users.index');
Route::get('/admin/users/create','AdminsUserController@create')->name('admin.users.create');
Route::post('/admin/users','AdminsUserController@store')->name('admin.users.store');
Route::get('/admin/users/{user}','AdminsUserController@show')->name('admin.users.show');
Route::get('/admin/users/{user}/edit','AdminsUserController@edit')->name('admin.users.edit');
Route::put('/admin/users/{user}/update','AdminsUserController@update')->name('admin.users.update');
Route::delete('/admin/users/{user}/destroy','AdminsUserController@destroy')->name('admin.users.destroy');

Route::get('/admin/concerts','AdminsConcertController@index')->name('admin.concerts.index');
Route::get('/admin/concerts/create','AdminsConcertController@create')->name('admin.concerts.create');
Route::post('/admin/concerts','AdminsConcertController@store')->name('admin.concerts.store');
Route::get('/admin/concerts/{concert}','AdminsConcertController@show')->name('admin.concerts.show');
Route::get('/admin/concerts/{concert}/edit','AdminsConcertController@edit')->name('admin.concerts.edit');
Route::put('/admin/concerts/{concert}/update','AdminsConcertController@update')->name('admin.concerts.update');
Route::delete('/admin/concerts/{concert}/destroy','AdminsConcertController@destroy')->name('admin.concerts.destroy');

Route::get('/admin/media/{media}/edit','AdminsMediaController@edit')->name('admin.media.edit');
Route::put('/admin/media/{media}/update','AdminsMediaController@update')->name('admin.media.update');

Route::get('/admin/comments','AdminsPostCommentController@index')->name('admin.comments.index');
Route::get('/admin/comments/create','AdminsPostCommentController@create')->name('admin.comments.create');
Route::post('/admin/comments','AdminsPostCommentController@store')->name('admin.comments.store');
Route::get('/admin/comments/{comment}','AdminsPostCommentController@show')->name('admin.comments.show');
Route::get('/admin/comments/{comment}/edit','AdminsPostCommentController@edit')->name('admin.comments.edit');
Route::put('/admin/comments/{comment}/update','AdminsPostCommentController@update')->name('admin.comments.update');
Route::delete('/admin/comments/{comment}/destroy','AdminsPostCommentController@destroy')->name('admin.comments.destroy');

Route::get('/admin/replies','AdminsCommentReplyController@index')->name('admin.replies.index');
Route::get('/admin/replies/create','AdminsCommentReplyController@create')->name('admin.replies.create');
Route::post('/admin/replies','AdminsCommentReplyController@store')->name('admin.replies.store');
Route::get('/admin/replies/{comment_reply}','AdminsCommentReplyController@show')->name('admin.replies.show');
Route::get('/admin/replies/{comment_reply}/edit','AdminsCommentReplyController@edit')->name('admin.replies.edit');
Route::put('/admin/replies/{comment_reply}/update','AdminsCommentReplyController@update')->name('admin.replies.update');
Route::delete('/admin/replies/{comment_reply}/destroy','AdminsCommentReplyController@destroy')->name('admin.replies.destroy');

Route::get('/home', 'HomeController@index')->name('home');


