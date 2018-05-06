<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Media;
use App\Model\Course;
use App\Model\Classroom;
use App\Model\User;

class SiteController extends Controller {

    public function home() {
        return view('site.home');
    }

    public function course($id) {
        return view('site.course', [
            'course' => Course::whereId($id)->with(['image', 'creator', 'openClassrooms.registrations'])->first()
        ]);
    }

    public function loginPage() {
        if (Auth::user()) return redirect("/");
        return view('site.loginPage');
    }

    public function profile()
    {
        $user = Auth::user()->load(['avatar', 'registrations.course']);
        return view('site.profile', [
            "user" => $user
        ]);
    }

    public function newCourse()
    {
        return view('site.novoCurso');
    }

    public function newCourseAction()
    {
        $course = new Course(request()->all());
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $image = Media::newFromUploadedFile($file, 'course_avatar');
            $image->title = "Avatar of " . request('course_name') . " - " . date('Y-m-d');
            $image->owner_id = \Auth::id();
            $image->save();
            $course->image_id = $image->id;
        }
        $course->creator_id = \Auth::id();
        $course->save();
        return redirect('/course/' . $course->id);
    }

    public function newClassroom($id)
    {
        return view('site.newClassroom', [
            'course' => Course::find($id)
        ]);
    }

    public function newClassroomAction($id)
    {
        $classroom = new Classroom(request()->all());
        $classroom->creator_id = \Auth::id();
        $classroom->course_id = request('course_id');
        $classroom->hidden = (bool) request('hidden');
        $classroom->save();
        return redirect('/forum/' . $classroom->id);
    }

    public function editProfile()
    {
        return view('site.editProfile', [
            'user' => \Auth::user()
        ]);
    }

    public function editProfileAction()
    {
        $user = \Auth::user();
        $user->fill(request()->all());
        if (request()->hasFile('avatar')) {
            $file = request()->file('avatar');
            $image = Media::newFromUploadedFile($file, 'avatar');
            $image->title = "Avatar of " . $user->user_name . " - " . date('Y-m-d');
            $image->owner_id = \Auth::id();
            $image->save();
            $user->avatar_id = $image->id;
        }
        $user->save();
        return redirect('/profile');
    }

}