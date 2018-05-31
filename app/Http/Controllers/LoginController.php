<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\User;

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

    public function register()
    {
        $user = new User(request()->all());
        $user->email = request('email');
        $user->user_password = bcrypt(request('password'));
        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
}