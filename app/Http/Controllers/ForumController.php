<?php

namespace App\Http\Controllers;

use \App\Model\Classroom;
use \App\Model\Task;
use \App\Model\Section;
use \App\Model\Calendar;
use \App\Model\Grade;
use \App\Model\Media;
use \App\Model\Chapter;
use \App\Model\Topic;
use \App\Model\Post;
use \App\Contracts\ActualClassroom;
use \App\Contracts\StorageServiceContract;

class ForumController extends Controller 
{
    public function home(ActualClassroom $classroom)
    {
        $classroom->load('tasks.myGrade');
        return view('forum.home', compact('classroom'));
    }

    public function editWelcomeText(ActualClassroom $classroom)
    {
        return view('forum.editWelcomeText', compact('classroom'));
    }

    public function editWelcomeTextAction(ActualClassroom $classroom)
    {
        $id = request()->route('id');
        $classroom->welcome_text = request('welcome_text');
        $classroom->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newTask(ActualClassroom $classroom)
    {
        return view('forum.newTask', compact('classroom'));
    }

    public function newTaskAction()
    {
        $id = request()->route('id');
        $task = new Task(request()->all());
        $task->delivery_form = join(request('delivery_form_arr', []));
        $task->creator_id = \Auth::id();
        $task->classroom_id = $id;
        $task->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newSection(ActualClassroom $classroom)
    {
        return view('forum.newSection', compact('classroom'));
    }

    public function newSectionAction()
    {
        $id = request()->route('id');
        $section = new Section(request()->all());
        $section->creator_id = \Auth::id();
        $section->classroom_id = $id;
        $section->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function section(ActualClassroom $classroom)
    {
        return view('forum.section', [
            'section' => Section::with(['topics' => function ($query) {
                $query->withCount('posts');
                $query->with('creator');
                $query->with('lastPost.creator');
            }])->find(request()->route('sid')),
            'classroom' => $classroom
        ]);
    }

    public function topic(ActualClassroom $classroom)
    {
        $section = $classroom->sections()->findOrFail(request()->route('sid'));
        $topic = $section->topics()->findOrFail(request()->route('tid'));
        $posts = $topic->posts()->with(['creator' => function ($query) {
            $query->withCount('topics');
            $query->withCount('posts');
            $query->with('avatar');
        }])->paginate(20);
        return view('forum.topic', compact('classroom', 'section', 'topic', 'posts'));
    }

    public function calendar(ActualClassroom $classroom)
    {
        $classroom->load('calendar');
        return view('forum.calendar', ['classroom' => $classroom]);
    }

    public function calendarAction(ActualClassroom $classroom)
    {
        $calendar = new Calendar(request()->all());
        $calendar->classroom_id = $classroom->id;
        $calendar->creator_id = \Auth::id();
        $calendar->save();
        return redirect()->back();
    }

    public function calendarDeleteAction(ActualClassroom $classroom)
    {
        $calendar = $classroom->calendar()->findOrFail(request()->route('cid'));
        $calendar->delete();
        return redirect()->back();
    }

    public function task(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->with('myGrade.media')->find(request()->route('tid'));
        return view('forum.task', compact('task', 'classroom'));
    }

    public function taskSubmit(ActualClassroom $classroom, StorageServiceContract $storage)
    {
        $task = $classroom->tasks()->find(request('task_id'));
        $grade = new Grade(request()->all());
        $grade->user_id = \Auth::id();
        $grade->task_id = $task->id;
        if (request()->hasFile('media')) {
            $grade->media_id = $storage->storeGradeFile(request()->file('media'), "Trabalho de " . \Auth::user()->user_name)->id;
        }
        $grade->save();
        return redirect()->back();
    }

    public function newChapter(ActualClassroom $classroom)
    {
        $classroom->loadDefault();
        return view('forum.newChapter', compact('classroom'));
    }

    public function newChapterAction(ActualClassroom $classroom,  StorageServiceContract $storage)
    {
        $id = $classroom->id;
        $chapter = new Chapter(request()->all());
        $chapter->creator_id = \Auth::id();
        $chapter->classroom_id = $classroom->id;
        if (request()->hasFile('media')) {
            $chapter->media_id = $storage->storeChapterFile(request()->file('media'), "Capítulo " . $chapter->title)->id;
        }
        $chapter->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function chapter(ActualClassroom $classroom)
    {
        $chapter = $classroom->chapters()->findOrFail(request()->route('cid'));
        return view('forum.chapter', compact(['classroom', 'chapter']));
    }

    public function registrations(ActualClassroom $classroom)
    {
        $classroom->load(['registrations' => function ($query) {
            $query->wherePivot('approved', false);
        }]);
        return view('forum.registrations', compact('classroom'));
    }

    public function registrationsAction(ActualClassroom $classroom)
    {
        if (request('approve')) {
            $classroom->registrations()->updateExistingPivot(request('user_id'), [
                'approved' => true
            ]);
        } else {
            $classroom->registrations()->detach(request('user_id'));
        }
        return redirect()->back();
    }

    public function students(ActualClassroom $classroom)
    {
        $classroom->load(['registrations' => function ($query) {
            $query->wherePivot("approved", true);
        }]);
        return view('forum.students', compact('classroom'));
    }

    public function grades(ActualClassroom $classroom)
    {
        $classroom->load(['tasks' => function ($query) {
            $query->withCount(['grades as pending_count' => function ($query) {
                $query->whereNull('avaliator_id');
            }]);
        }]);
        return view('forum.grades', compact('classroom'));
    }

    public function taskGrades(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->findOrFail(request()->route('tid'));
        $naoAvaliados = $task->grades()->with('user')->whereNull('avaliator_id')->get();
        $avaliados = $task->grades()->with('user')->whereNotNull('avaliator_id')->get();
        return view('forum.taskGrades', compact('classroom', 'task', 'naoAvaliados', 'avaliados'));
    }

    public function taskGradesAction()
    {
        $grade = Grade::find(request('grade_id'));
        $grade->val = request('val');
        $grade->avaliator_id = \Auth::id();
        $grade->save();
        return redirect()->back();
    }

    public function newPost(ActualClassroom $classroom)
    {
        $section = $classroom->sections()->findOrFail(request()->route('sid'));
        $topic = ($tid = request()->route('tid')) ? $section->topics()->findOrFail($tid) : null;
        return view('forum.newPost', compact('classroom', 'section', 'topic'));
    }

    public function newPostAction(ActualClassroom $classroom)
    {
        if (!($topic_id = request()->route('tid'))) {
            $topic = new Topic();
            $topic->title = request('topic_title');
            $topic->creator_id = \Auth::id();
            $topic->section_id = request()->route('sid');
            $topic->save();
            $topic_id = $topic->id;
        }
        $post = new Post();
        $post->content = request('content');
        $post->creator_id = \Auth::id();
        $post->topic_id = $topic_id;
        $post->save();
        return redirect(route('forum.topic', ['id' => $classroom->id, 'tid' => $topic_id, 'sid' => request()->route('sid')]));
    }

    public function deleteChapter(ActualClassroom $classroom)
    {
        $chapter = $classroom->chapters()->findOrFail(request()->route("cid"));
        return view('forum.deleteChapter', compact('chapter', 'classroom'));
    }

    public function deleteChapterAction(ActualClassroom $classroom)
    {
        $chapter = $classroom->chapters()->findOrFail(request()->route("cid"));
        $chapter->delete();
        return redirect(route('forum.home', ['id' => $classroom->id]));
    }

    public function editChapter(ActualClassroom $classroom)
    {
        $chapter = $classroom->chapters()->findOrFail(request()->route("cid"));
        return view('forum.editChapter', compact('chapter', 'classroom'));
    }

    public function editChapterAction(ActualClassroom $classroom, StorageServiceContract $storage)
    {
        $chapter = $classroom->chapters()->findOrFail(request()->route("cid"));
        $chapter->fill(request()->all());
        if (request()->hasFile('media')) {
            $chapter->media_id = $storage->storeChapterFile(request()->file('media'), $chapter->title)->id;
        }
        $chapter->save();
        return redirect(route('forum.chapter', ['id' => $classroom->id, 'cid' => $chapter->id]));
    }

    public function editTask(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->find(request()->route('tid'));
        return view('forum.editTask', compact('classroom', 'task'));
    }

    public function editTaskAction(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->find(request()->route('tid'));
        $task->fill(request()->all());
        $task->delivery_form = join(request('delivery_form_arr', []));
        $task->save();
        return redirect(route('forum.task', ['id' => $classroom->id, 'tid' => $task->id]));
    }

    public function deleteTask(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->find(request()->route('tid'));
        return view('forum.deleteTask', compact('classroom', 'task'));
    }

    public function deleteTaskAction(ActualClassroom $classroom)
    {
        $task = $classroom->tasks()->find(request()->route('tid'));
        $task->delete();
        return redirect(route('forum.home', ['id' => $classroom->id]));
    }
}