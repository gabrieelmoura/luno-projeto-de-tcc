<?php

namespace App\Http\Controllers;

use \App\Model\Classroom;

class ForumController extends Controller {

    public function home($id)
    {
        return view('forum.home', [
            'classroom' => Classroom::whereId($id)->with([
                'course', 'chapters', 'creator', 'sections',
                'chapters', 'tasks'
            ])->first()
        ]);
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
        $classroom = Classroom::whereId($id)->with([
            'tasks'
        ])->first();
        return view('forum.newTask', compact('classroom'));
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