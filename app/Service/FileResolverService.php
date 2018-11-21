<?php

namespace App\Service;

use App\Model\Grade;
use App\Model\User;
use App\Model\Course;
use App\Model\Chapter;
use App\Contracts\FileResolverServiceContract;

class FileResolverService implements FileResolverServiceContract
{
    public function filePathForGrade(Grade $grade)
    {
        $grade->load('media');
        return $this->path($grade->media->location);
    }

    public function filePathForAvatar(User $user)
    {
        $user->load('avatar');
        return $this->path($user->avatar->location);
    }

    public function filePathForCourseAvatar(Course $course)
    {
        $course->load('image');
        return $this->path($course->image->location);
    }

    public function filePathForChapter(Chapter $chapter)
    {
        $chapter->load('media');
        return $this->path($chapter->media->location);
    }

    private function path($path)
    {
        return storage_path('app/' . preg_replace('/^\/?(.*)$/', "$1", $path));
    }
}