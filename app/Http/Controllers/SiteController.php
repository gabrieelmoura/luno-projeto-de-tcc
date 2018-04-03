<?php

namespace App\Http\Controllers;

use Auth;

class SiteController extends Controller {

    public function home() {
        return view('site.home');
    }

    public function classroom($id) {
        return view('site.classroom');
    }

    public function loginPage() {
        if (Auth::user()) return redirect("/");
        return view('site.loginPage');
    }

    public function profile()
    {
        $user = Auth::user()->load('avatar');
        return view('site.profile', [
            "user" => $user
        ]);
    }

}