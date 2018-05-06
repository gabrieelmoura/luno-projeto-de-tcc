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
Route::get('/course/{id}', 'SiteController@course');
Route::get('/login', 'SiteController@loginPage');
Route::get('/profile', 'SiteController@profile');

Route::post('/auth', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/editar-perfil', 'SiteController@editProfile');
    Route::post('/editar-perfil', 'SiteController@editProfileAction');
    Route::get('/novo-curso', 'SiteController@newCourse');
    Route::post('/novo-curso', 'SiteController@newCourseAction');
    Route::get('/nova-turma/{id}', 'SiteController@newClassroom');
    Route::post('/nova-turma/{id}', 'SiteController@newClassroomAction');
    
    Route::get('/forum/{id}', 'ForumController@home');
    Route::get('/section/{id}', 'ForumController@section');
    Route::get('/topic/{id}', 'ForumController@topic');
});

