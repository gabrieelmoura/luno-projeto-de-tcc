<?php

namespace App\Http\Controllers;

use App\Model\Grade;
use App\Model\User;
use App\Model\Course;
use App\Model\Chapter;
use App\Contracts\FileResolverServiceContract;

class StorageController extends Controller
{
    public function grade(FileResolverServiceContract $fileResolver)
    {
        $grade = Grade::find(request()->route('id'));
        $filePath = $fileResolver->filePathForGrade($grade);
        return response()->file($filePath);
    }

    public function avatar(FileResolverServiceContract $fileResolver)
    {
        $user = User::find(request()->route('id'));
        $filePath = $fileResolver->filePathForAvatar($user);
        return response()->file($filePath);
    }

    public function course(FileResolverServiceContract $fileResolver)
    {
        $course = Course::find(request()->route('id'));
        $filePath = $fileResolver->filePathForCourseAvatar($course);
        return response()->file($filePath);
    }

    public function chapter(FileResolverServiceContract $fileResolver)
    {
        $chapter = Chapter::find(request()->route('id'));
        $filePath = $fileResolver->filePathForChapter($chapter);
        return response()->file($filePath);
    }
}