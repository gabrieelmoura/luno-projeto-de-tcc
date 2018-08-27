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

Route::get('/login', 'SiteController@loginPage')->name('site.login');

Route::post('/auth', 'LoginController@auth')->name('login.auth');

Route::post('/register', 'LoginController@register')->name('login.register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'SiteController@profile')->name('site.profile');
    Route::get('/logout', 'LoginController@logout')->name('login.logout');

    Route::get('/editar-perfil', 'SiteController@editProfile')->name('site.edit-profile');
    Route::post('/editar-perfil', 'SiteController@editProfileAction')->name('site.edit-profile-action');

    Route::get('/novo-curso', 'SiteController@newCourse')->name('site.new-course');
    Route::post('/novo-curso', 'SiteController@newCourseAction')->name('site.new-course-action');

    Route::get('/nova-turma/{id}', 'SiteController@newClassroom')->name('site.new-classroom');
    Route::post('/nova-turma/{id}', 'SiteController@newClassroomAction')->name('site.new-classroom-action');;

    Route::post('/matricular', 'SiteController@register')->name('site.classroom-register');

    Route::group(['prefix' => 'forum/{id}'], function () {
        Route::get('/editar-quadro', 'ForumController@editWelcomeText')->name('forum.edit-welcome-text');
        Route::post('/editar-quadro', 'ForumController@editWelcomeTextAction')->name('forum.edit-welcome-text-action');

        Route::get('/nova-tarefa', 'ForumController@newTask')->name('forum.new-task');
        Route::post('/nova-tarefa', 'ForumController@newTaskAction')->name('forum.new-task-action');
        Route::post('/entregar-tarefa', 'ForumController@taskSubmit')->name('forum.task-submit');

        Route::get('/nova-sessao', 'ForumController@newSection')->name('forum.new-section');
        Route::post('/nova-sessao', 'ForumController@newSectionAction')->name('forum.new-section-action');

        Route::get('/calendar', 'ForumController@calendar')->name('forum.calendar');
        Route::post('/calendar', 'ForumController@calendarAction')->name('forum.calendar-action');

        Route::get('/novo-capitulo', 'ForumController@newChapter')->name('forum.new-chapter');
        Route::post('/novo-capitulo', 'ForumController@newChapterAction')->name('forum.new-chapter-action');

        Route::get('/registrations', 'ForumController@registrations')->name('forum.registrations');
        Route::post('/registrations', 'ForumController@registrationsAction')->name('forum.registrations-action');

        Route::get('/lancar-notas/{tid}', 'ForumController@taskGrades')->name('forum.taskGrades');
        Route::post('/lancar-notas/{tid}', 'ForumController@taskGradesAction')->name('forum.taskGradesAction');

        Route::get('/novo-post/{sid}', 'ForumController@newPost')->name('forum.newPost');
        Route::post('/novo-post/{sid}', 'ForumController@newPostAction')->name('forum.newPostAction');

        Route::get('/', 'ForumController@home')->name('forum.home');
        
        Route::get('/tarefa/{tid}', 'ForumController@task')->name('forum.task');
        
        Route::get('/sessao/{sid}', 'ForumController@section')->name('forum.section');
        
        Route::get('/topico/{tid}', 'ForumController@topic')->name('forum.topic');

        Route::get('/material/{cid}', 'ForumController@chapter')->name('forum.chapter');

        Route::get('/turma', 'ForumController@students')->name('forum.students');

        Route::get('/lancar-notas', 'ForumController@grades')->name('forum.grades');
    });
});
