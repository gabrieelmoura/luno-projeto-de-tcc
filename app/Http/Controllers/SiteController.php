<?php

namespace App\Http\Controllers;

class SiteController extends Controller {

    public function home() {
        return view('site.home');
    }

    public function classroom($id) {
        return view('site.classroom');
    }

}