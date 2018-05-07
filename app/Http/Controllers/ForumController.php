<?php

namespace App\Http\Controllers;

use \App\Model\Classroom;
use \App\Model\Task;
use \App\Model\Section;

class ForumController extends Controller {

    public function home($id)
    {
        $classroom = Classroom::whereId($id)->with([
            'course', 'chapters', 'creator', 'chapters', 'tasks'
        ])->with(['sections' => function ($query) {
            $query->withCount('topics');
        }])->first();
        return view('forum.home', compact('classroom'));
    }

    public function editWelcomeText($id)
    {
        return view('forum.editWelcomeText', [
            'classroom' => Classroom::whereId($id)->with([
                'course', 'chapters', 'creator', 'sections',
                'chapters', 'tasks'
            ])->first()
        ]);
    }

    public function editWelcomeTextAction($id)
    {
        $classroom = Classroom::find($id);
        $classroom->welcome_text = request('welcome_text');
        $classroom->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newTask($id)
    {
        $classroom = Classroom::whereId($id)->first();
        return view('forum.newTask', compact('classroom'));
    }

    public function newTaskAction($id)
    {
        $task = new Task(request()->all());
        $task->creator_id = \Auth::id();
        $task->classroom_id = $id;
        $task->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function newSection($id)
    {
        $classroom = Classroom::whereId($id)->first();
        return view('forum.newSection', compact('classroom'));
    }

    public function newSectionAction($id)
    {
        $section = new Section(request()->all());
        $section->creator_id = \Auth::id();
        $section->classroom_id = $id;
        $section->save();
        return redirect(route('forum.home', compact('id')));
    }

    public function section()
    {
        return view('forum.section');
    }

    public function topic()
    {
        return view('forum.topic');
    }

}
