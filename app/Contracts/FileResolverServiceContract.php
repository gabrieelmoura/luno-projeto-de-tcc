<?php

namespace App\Contracts;

use App\Model\Grade;
use App\Model\User;
use App\Model\Course;
use App\Model\Chapter;

interface FileResolverServiceContract
{
    public function filePathForGrade(Grade $grade);
    public function filePathForAvatar(User $user);
    public function filePathForCourseAvatar(Course $course);
    public function filePathForChapter(Chapter $chapter);
}