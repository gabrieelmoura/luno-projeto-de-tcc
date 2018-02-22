<?php

namespace App\Http\Controllers;

class ForumController extends Controller {

    public function home() {
        return view('forum.home');
    }

    public function section() {
        return view('forum.section');
    }

    public function topic() {
        return view('forum.topic');
    }

}