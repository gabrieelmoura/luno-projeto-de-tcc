<?php

namespace App\Http\Controllers;

use \App\Model\Classroom;
use \App\Model\Task;
use \App\Model\Section;
use \App\Model\Calendar;
use \App\Model\Grade;
use \App\Model\Media;
use \App\Model\Chapter;

class ForumController extends Controller {

    private $classroom;

    public function __construct()
    {
        $this->classroom = Classroom::find(request()->route('id'));
        
    }

    public function home($id)
    {
        $this->classroom->loadDefault();
        $this->classroom->load('tasks.myGrade');
        return view('forum.home', ['classroom' => $this->classroom]);
    }

    public function editWelcomeText($id)
    {
        return view('forum.editWelcomeText', ['classroom' => $this->classroom]);
    }

    public function editWelcomeTextAction($id)
    {
        $this->classroom->welcome_text = request('welcome_text');
        $this->classroom->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newTask($id)
    {
        $this->classroom->loadDefault();
        return view('forum.newTask', ['classroom' => $this->classroom]);
    }

    public function newTaskAction($id)
    {
        $task = new Task(request()->all());
        $task->delivery_form = join(request('delivery_form_arr', []));
        $task->creator_id = \Auth::id();
        $task->classroom_id = $id;
        $task->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newSection($id)
    {
        $this->classroom->loadDefault();
        return view('forum.newSection', ['classroom' => $this->classroom]);
    }

    public function newSectionAction($id)
    {
        $section = new Section(request()->all());
        $section->creator_id = \Auth::id();
        $section->classroom_id = $id;
        $section->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function section($id)
    {
        $this->classroom->loadDefault();
        return view('forum.section', [
            'section' => Section::find($id),
            'classroom' => $this->classroom
        ]);
    }

    public function topic()
    {
        return view('forum.topic');
    }

    public function calendar()
    {
        $this->classroom->loadDefault();
        $this->classroom->load('calendar');
        return view('forum.calendar', ['classroom' => $this->classroom]);
    }

    public function calendarAction($id)
    {
        $calendar = new Calendar(request()->all());
        $calendar->classroom_id = $id;
        $calendar->creator_id = \Auth::id();
        $calendar->save();
        return redirect()->back();
    }

    public function task($id, $tid)
    {
        $this->classroom->loadDefault();
        $task = Task::with('myGrade')->find($tid);
        return view('forum.task', ['classroom' => $this->classroom, 'task' => $task]);
    }

    public function taskSubmit($id)
    {
        $grade = new Grade(request()->all());
        $grade->user_id = \Auth::id();
        $grade->task_id = request('task_id');
        if (request()->hasFile('media')) {
            $media = Media::newFromUploadedFile(request()->file('media'), 'task');
            $media->title = "Resposta de " . \Auth::user()->user_name . " para a tarefa " . request('task_id') . date('Y-m-d');
            $media->owner_id = \Auth::id();
            $media->save();
            $grade->media_id = $media->id;
        }
        $grade->save();
        return redirect()->back();
    }

    public function newChapter()
    {
        $this->classroom->loadDefault();
        return view('forum.newChapter', ['classroom' => $this->classroom]);
    }

    public function newChapterAction($id)
    {
        $chapter = new Chapter(request()->all());
        $chapter->creator_id = \Auth::id();
        $chapter->classroom_id = $id;
        $chapter->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function chapter($id, $cid)
    {
        $this->classroom->loadDefault();
        $chapter = Chapter::find($cid);
        return view('forum.chapter', ['classroom' => $this->classroom, 'chapter' => $chapter ]);
    }

    public function registrations()
    {
        $this->classroom->loadDefault();
        $this->classroom->load(['registrations' => function ($query) {
            $query->wherePivot('approved', false);
        }]);
        return view('forum.registrations', ['classroom' => $this->classroom]);
    }

    public function registrationsAction()
    {
        if (request('approve')) {
            $this->classroom->registrations()->updateExistingPivot(request('user_id'), [
                'approved' => true
            ]);
        } else {
            $this->classroom->registrations()->detach(request('user_id'));
        }
        return redirect()->back();
    }

    public function students()
    {
        $this->classroom->loadDefault();
        $this->classroom->load(['registrations' => function ($query) {
            $query->wherePivot("approved", true);
        }]);
        return view('forum.students', ['classroom' => $this->classroom]);
    }

}
