<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "luno_media";

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }

    public function owner()
    {
        return $this->belongsTo(Media::class, "owner_id", "id");
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
        });
    }

    public static function newFromUploadedFile($file, $type)
    {
        $media = new Media;
        $media->mime = $file->getMimeType();
        $media->size = $file->getClientSize();
        $media->location = env('MEDIA_PREFIX') . '/' . $file->store($type);
        $media->media_type = $type;
        return $media;
    }
}