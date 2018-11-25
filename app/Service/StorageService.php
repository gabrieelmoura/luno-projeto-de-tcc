<?php

namespace App\Service;

use App\Contracts\StorageServiceContract;
use App\Contracts\ActualClassroom;
use App\Model\Media;

class StorageService implements StorageServiceContract
{
    private $classroom;

    public function __construct(ActualClassroom $classroom)
    {
        $this->classroom = $classroom;
    }

    public function storeGradeFile($file, $title)
    {
        $media = new Media;
        $media->mime = $file->getMimeType();
        $media->size = $file->getClientSize();
        $media->location = $file->store('task');
        $media->media_type = 'task';
        $media->title = $title;
        $media->owner_id = \Auth::id();
        $media->classroom_id = $this->classroom->id;
        $media->save();
        return $media;
    }

    public function storeChapterFile($file, $title)
    {
        $media = new Media;
        $media->mime = $file->getMimeType();
        $media->size = $file->getClientSize();
        $media->location = $file->store('chapter');
        $media->media_type = 'chapter';
        $media->title = $title;
        $media->owner_id = \Auth::id();
        $media->classroom_id = $this->classroom->id;
        $media->save();
        return $media;
    }

    public function storeAvatarFile($file, $title)
    {
        $media = new Media;
        $media->mime = $file->getMimeType();
        $media->size = $file->getClientSize();
        $media->location = $file->store('avatar');
        $media->media_type = 'avatar';
        $media->title = $title;
        $media->owner_id = \Auth::id();
        $media->save();
        return $media;
    }

    public function storeCourseImageFile($file, $title)
    {
        $media = new Media;
        $media->mime = $file->getMimeType();
        $media->size = $file->getClientSize();
        $media->location = $file->store('course-image');
        $media->media_type = 'avatar';
        $media->title = $title;
        $media->owner_id = \Auth::id();
        $media->save();
        return $media;
    }
}