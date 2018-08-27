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
        $this->classroom->loadDefault();
        return view('forum.topic', [
            'classroom' => $this->classroom
        ]);
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

    public function grades()
    {
        $this->classroom->loadDefault();
        $this->classroom->load(['tasks' => function ($query) {
            $query->withCount(['grades as pending_count' => function ($query) {
                $query->whereNull('avaliator_id');
            }]);
        }]);
        return view('forum.grades', ['classroom' => $this->classroom]);
    }

    public function taskGrades($tid)
    {
        $this->classroom->loadDefault();
        $classroom = $this->classroom;
        $task = \App\Model\Task::find($tid);
        $naoAvaliados = $task->grades()->with('user')->whereNull('avaliator_id')->get();
        $avaliados = $task->grades()->with('user')->whereNotNull('avaliator_id')->get();
        return view('forum.taskGrades', compact('classroom', 'task', 'naoAvaliados', 'avaliados'));
    }

    public function taskGradesAction($id, $tid)
    {
        $grade = Grade::find(request('grade_id'));
        $grade->val = request('val');
        $grade->avaliator_id = \Auth::id();
        $grade->save();
        return redirect()->back();
    }

    public function newPost($id, $sid)
    {
        $classroom = $this->classroom->loadDefault();
        $section = Section::findOrFail($sid);
        return view('forum.newPost', compact('classroom', 'section'));
    }

    public function newPostAction()
    {
        if (!request('topic_id')) {
            $topic = new Topic();
            $topic->title = request('topic_title');
            $topic->creator_id = \Auth::id();
            $topic->section_id = request('section_id');
            $topic->save();
            $topic_id = $topic->id;
        } else {
            $topic_id = request('topic_id');
        }
        $post = new Post();
        $post->content = request('content');
        $post->creator_id = \Auth::id();
        $post->topic_id = $topic_id;
        $post->save();
        return redirect(route('forum.topic', ['id' => $this->classroom->id, 'tid' => $topic_id]));
    }

}
