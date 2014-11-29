<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','SystemsController@index');

Route::get('get/username/by/{phone?}', 'UsersController@getUsernameByPhone');
Route::get('send/message/{message?}', 'ChatsController@sendMessage');
Route::get('receive/message/{channel}', 'ChatsController@receiveMessage');

Route::get('users/{id}/chat','ChatsController@index');
Route::get('dashboard','SystemsController@dashboard');
Route::get('login','UsersController@login');
Route::post('login','UsersController@login');