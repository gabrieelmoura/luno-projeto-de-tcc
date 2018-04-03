<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = "luno_attachments";

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id", "id");
    }

    public function media()
    {
        return $this->belongsTo(Media::class, "media_id", "id");
    }
}