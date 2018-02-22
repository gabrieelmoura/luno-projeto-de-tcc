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

Route::group(['prefix' => '/forum/{fId}'], function () {
    Route::get('/', 'ForumController@home');
    Route::get('/{sId}', 'ForumController@section');
    Route::get('/{sId}/{tId}', 'ForumController@topic');
});
