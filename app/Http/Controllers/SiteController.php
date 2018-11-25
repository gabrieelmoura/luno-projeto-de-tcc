<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Media;
use App\Model\Course;
use App\Model\Classroom;
use App\Model\User;
use App\Contracts\StorageServiceContract;

class SiteController extends Controller 
{

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
        if ($id = request()->route('id')) {
            $user = User::withCount('topics')->withCount('posts')->findOrFail($id);
        } else {
            $user = User::withCount('topics')->withCount('posts')->findOrFail(Auth::id());
        };
        $user->load(['avatar', 'registrations.course']);
        return view('site.profile', compact('user'));
    }

    public function newCourse()
    {
        return view('site.novoCurso');
    }

    public function newCourseAction(StorageServiceContract $storage)
    {
        $course = new Course(request()->all());
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $title = "Avatar of " . request('course_name') . " - " . date('Y-m-d');
            $media = $storage->storeCourseImageFile($file, $title);
            $course->image()->associate($media);
        }
        $course->creator_id = \Auth::id();
        $course->save();
        return redirect(route('site.course', ['id' => $course]));
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

    public function editProfileAction(StorageServiceContract $storage)
    {
        $user = \Auth::user();
        $user->fill(request()->all());
        if (request()->hasFile('avatar')) {
            $user->avatar_id = $storage->storeAvatarFile(request()->file('avatar'), "Avatar of " . $user->user_name . " - " . date('Y-m-d'))->id;
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

    public function editCourse()
    {
        $course = Course::find(request()->route('id'));
        return view('site.editCourse', compact('course'));
    }

    public function editCourseAction(StorageServiceContract $storage)
    {
        $course = Course::find(request()->route('id'));
        $course->fill(request()->all());
        if (request()->hasFile('image')) {
            $media = $storage->storeCourseImageFile(request()->file('image'), "Foto do curso " . $course->course_name);
            $course->image()->associate($media);
        }
        $course->save();
        return redirect(route('site.course', ['id' => $course->id]));
    }

    public function deleteCourse()
    {
        $course = Course::find(request()->route('id'));
        return view('site.deleteCourse', compact('course'));
    }

    public function deleteCourseAction()
    {
        $course = Course::find(request()->route('id'));
        $course->delete();
        return redirect(route('site.home'));
    }
}