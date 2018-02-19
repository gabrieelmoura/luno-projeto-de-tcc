<?php

namespace App\Http\Controllers;

class ForumController extends Controller {

    public function home() {
        return view('forum.home');
    }

}