<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Media;
use App\Model\Course;
use App\Model\Classroom;
use App\Model\User;

class SiteController extends Controller {

    public function home() {
        $courses = Course::join('luno_view_featured_courses_index as fci', 'fci.course_id', '=', 'luno_courses.id')
            ->orderBy('fci.qtd_recent', 'DESC')
            ->orderBy('fci.qtd_all', 'DESC')
            ->select('luno_courses.*')
            ->with(['image', 'creator'])
            ->withCount('openClassrooms')
            ->take(5)
            ->get();
        return view('site.home', ['courses' => $courses]);
    }

    public function course($id) {
        $course = Course::with([
            'image', 'creator', 'openClassrooms' => function ($query) {
                $query->withCount('students');
                $query->with('myRegistrations');
            }
        ])->find($id);
        return view('site.course', compact('course'));
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
        $classroom->registrations()->attach(\Auth::id(), [
            'approved' => true,
            'role' => 'teacher'
        ]);
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

    public function register()
    {
        $classroom = Classroom::find(request('id'));
        $classroom->registrations()->attach(\Auth::id());
        return redirect()->back();
    }

}