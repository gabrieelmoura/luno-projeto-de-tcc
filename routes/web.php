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

Route::get('/storage/grade/{id}',   'StorageController@grade'  )->name('storage.grade');
Route::get('/storage/avatar/{id}',  'StorageController@avatar' )->name('storage.avatar');
Route::get('/storage/course/{id}',  'StorageController@course' )->name('storage.course');
Route::get('/storage/chapter/{id}', 'StorageController@chapter')->name('storage.chapter');

Route::get('/',            'SiteController@home'     )->name('site.home');
Route::get('/curso/{id}',  'SiteController@course'   )->name('site.course');
Route::get('/login',       'SiteController@loginPage')->name('login');
Route::post('/auth',       'LoginController@auth'    )->name('login.auth');
Route::post('/register',   'LoginController@register')->name('login.register');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/{id}',         'SiteController@profile'           )->name('site.user');
    Route::get('/profile',              'SiteController@profile'           )->name('site.profile');

    Route::get('/logout',               'LoginController@logout'           )->name('login.logout');

    Route::get('/editar-perfil',        'SiteController@editProfile'       )->name('site.edit-profile');
    Route::post('/editar-perfil',       'SiteController@editProfileAction' )->name('site.edit-profile-action');

    Route::get('/novo-curso',           'SiteController@newCourse'         )->name('site.new-course');
    Route::post('/novo-curso',          'SiteController@newCourseAction'   )->name('site.new-course-action');
    Route::get('/editar-curso/{id}',    'SiteController@editCourse'        )->name('site.edit-course');
    Route::post('/editar-curso/{id}',   'SiteController@editCourseAction'  )->name('site.edit-course-action');
    Route::get('/deletar-curso/{id}',   'SiteController@deleteCourse'      )->name('site.delete-course');
    Route::post('/deletar-curso/{id}',  'SiteController@deleteCourseAction')->name('site.delete-course-action');

    Route::get('/nova-turma/{id}',      'SiteController@newClassroom'      )->name('site.new-classroom');
    Route::post('/nova-turma/{id}',     'SiteController@newClassroomAction')->name('site.new-classroom-action');;

    Route::post('/matricular',          'SiteController@register'          )->name('site.classroom-register');

    Route::group(['prefix' => 'forum/{id}'], function () {

        Route::get('/editar-quadro',                 'ForumController@editWelcomeText'      )->name('forum.edit-welcome-text');
        Route::post('/editar-quadro',                'ForumController@editWelcomeTextAction')->name('forum.edit-welcome-text-action');

        Route::get('/nova-sessao',                   'ForumController@newSection'           )->name('forum.new-section');
        Route::post('/nova-sessao',                  'ForumController@newSectionAction'     )->name('forum.new-section-action');
        Route::get('/editar-sessao/{sid}',           'ForumController@editSection'          )->name('forum.edit-section');
        Route::post('/editar-sessao/{sid}',          'ForumController@editSectionAction'    )->name('forum.edit-section-action');
        Route::get('/deletar-sessao/{sid}',          'ForumController@deleteSection'        )->name('forum.delete-section');
        Route::post('/deletar-sessao/{sid}',         'ForumController@deleteSectionAction'  )->name('forum.delete-section-action');

        Route::get('/calendar',                      'ForumController@calendar'             )->name('forum.calendar');
        Route::post('/calendar',                     'ForumController@calendarAction'       )->name('forum.calendar-action');
        Route::post('/delete-calendar/{cid}',        'ForumController@calendarDeleteAction' )->name('forum.calendar-delete-action');

        Route::get('/novo-capitulo',                 'ForumController@newChapter'           )->name('forum.new-chapter');
        Route::post('/novo-capitulo',                'ForumController@newChapterAction'     )->name('forum.new-chapter-action');
        Route::get('/deletar-capitulo/{cid}',        'ForumController@deleteChapter'        )->name('forum.delete-chapter');
        Route::post('/deletar-capitulo/{cid}',       'ForumController@deleteChapterAction'  )->name('forum.delete-chapter-action');
        Route::get('/editar-capitulo/{cid}',         'ForumController@editChapter'          )->name('forum.edit-chapter');
        Route::post('/editar-capitulo/{cid}',        'ForumController@editChapterAction'    )->name('forum.edit-chapter-action');

        Route::get('/registrations',                 'ForumController@registrations'        )->name('forum.registrations');
        Route::post('/registrations',                'ForumController@registrationsAction'  )->name('forum.registrations-action');

        Route::get('/lancar-notas/{tid}',            'ForumController@taskGrades'           )->name('forum.taskGrades');
        Route::post('/lancar-notas/{tid}',           'ForumController@taskGradesAction'     )->name('forum.taskGradesAction');

        Route::get('/novo-post/{sid}',               'ForumController@newPost'              )->name('forum.newTopic');
        Route::post('/novo-post/{sid}',              'ForumController@newPostAction'        )->name('forum.newTopicAction');

        Route::get('/editar-post/{pid}',             'ForumController@editPost'             )->name('forum.edit-post');
        Route::post('/editar-post/{pid}',            'ForumController@editPostAction'       )->name('forum.edit-post-action');
        Route::get('/deletar-post/{pid}',            'ForumController@deletePost'           )->name('forum.delete-post');
        Route::post('/deletar-post/{pid}',           'ForumController@deletePostAction'     )->name('forum.delete-post-action');

        Route::get('/deletar-topico/{tid}',          'ForumController@deleteTopic'          )->name('forum.delete-topic');
        Route::post('/deletar-topico/{tid}',         'ForumController@deleteTopicAction'    )->name('forum.delete-topic-action');

        Route::get('/novo-post/{sid}/topico/{tid}',  'ForumController@newPost'              )->name('forum.newPost');
        Route::post('/novo-post/{sid}/topico/{tid}', 'ForumController@newPostAction'        )->name('forum.newPostAction');

        Route::get('/tarefa/{tid}',                  'ForumController@task'                 )->name('forum.task');
        Route::get('/editar-tarefa/{tid}',           'ForumController@editTask'             )->name('forum.edit-task');
        Route::post('/editar-tarefa/{tid}',          'ForumController@editTaskAction'       )->name('forum.edit-task-action');
        Route::get('/deletar-tarefa/{tid}',          'ForumController@deleteTask'           )->name('forum.delete-task');
        Route::post('/deletar-tarefa/{tid}',         'ForumController@deleteTaskAction'     )->name('forum.delete-task-action');
        Route::get('/nova-tarefa',                   'ForumController@newTask'              )->name('forum.new-task');
        Route::post('/nova-tarefa',                  'ForumController@newTaskAction'        )->name('forum.new-task-action');
        Route::post('/entregar-tarefa',              'ForumController@taskSubmit'           )->name('forum.task-submit');

        Route::get('/',                              'ForumController@home'                 )->name('forum.home');

        Route::get('/editar',                        'ForumController@edit'                 )->name('forum.edit');
        Route::post('/editar',                       'ForumController@editAction'           )->name('forum.edit-action');
        Route::get('/deletar',                       'ForumController@delete'               )->name('forum.delete');
        Route::post('/deletar',                      'ForumController@deleteAction'         )->name('forum.delete-action');

        Route::get('/sessao/{sid}',                  'ForumController@section'              )->name('forum.section');
        Route::get('/sessao/{sid}/topico/{tid}',     'ForumController@topic'                )->name('forum.topic');
        Route::get('/material/{cid}',                'ForumController@chapter'              )->name('forum.chapter');
        Route::get('/turma',                         'ForumController@students'             )->name('forum.students');
        Route::get('/lancar-notas',                  'ForumController@grades'               )->name('forum.grades');
        Route::get('/media',                         'ForumController@media'                )->name('forum.media');

    });

});
