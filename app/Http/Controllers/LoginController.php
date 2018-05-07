<?php

namespace App\Http\Controllers;

use Auth;

class LoginController
{
    public function auth()
    {
        request()->validate([
           'email' => 'required',
           'user_password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => request()->email,
            'password' => request()->user_password
        ], (bool) request('keep'))) return redirect('/');
        return redirect()->back()->withInput()->withErrors(['auth' => __('auth.failed')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}