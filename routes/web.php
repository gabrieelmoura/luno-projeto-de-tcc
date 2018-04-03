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

Route::get('/', 'SiteController@home');
Route::get('/classroom/{id}', 'SiteController@classroom');
Route::get('/login', 'SiteController@loginPage');
Route::get('/profile', 'SiteController@profile');

Route::post('/auth', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');

Route::get('/forum/{id}', 'ForumController@home');
Route::get('/section/{id}', 'ForumController@section');
Route::get('/topic/{id}', 'ForumController@topic');

