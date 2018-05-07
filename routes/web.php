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

Route::get('/', 'SiteController@home')->name('site.home');
Route::get('/course/{id}', 'SiteController@course')->name('site.course');
Route::get('/login', 'SiteController@loginPage')->name('login');
Route::get('/profile', 'SiteController@profile')->name('site.profile');

Route::post('/auth', 'LoginController@auth')->name('login.auth');
Route::get('/logout', 'LoginController@logout')->name('login.logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/editar-perfil', 'SiteController@editProfile')->name('site.edit-profile');
    Route::post('/editar-perfil', 'SiteController@editProfileAction')->name('site.edit-profile-action');

    Route::get('/novo-curso', 'SiteController@newCourse')->name('site.new-course');
    Route::post('/novo-curso', 'SiteController@newCourseAction')->name('site.new-course-action');

    Route::get('/nova-turma/{id}', 'SiteController@newClassroom')->name('site.new-classroom');
    Route::post('/nova-turma/{id}', 'SiteController@newClassroomAction')->name('site.new-classroom-action');;

    Route::get('/forum/{id}/editar-quadro', 'ForumController@editWelcomeText')->name('forum.edit-welcome-text');
    Route::post('/forum/{id}/editar-quadro', 'ForumController@editWelcomeTextAction')->name('forum.edit-welcome-text-action');

    Route::get('/forum/{id}/nova-tarefa', 'ForumController@newTask')->name('forum.new-task');
    Route::post('/forum/{id}/nova-tarefa', 'ForumController@newTaskAction')->name('forum.new-task-action');

    Route::get('/forum/{id}/nova-sessao', 'ForumController@newSection')->name('forum.new-section');
    Route::post('/forum/{id}/nova-sessao', 'ForumController@newSectionAction')->name('forum.new-section-action');

    Route::get('/forum/{id}', 'ForumController@home')->name('forum.home');
    Route::get('/section/{id}', 'ForumController@section')->name('forum-section');
    Route::get('/topic/{id}', 'ForumController@topic')->name('forum.topic');
});
