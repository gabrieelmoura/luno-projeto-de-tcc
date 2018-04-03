<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "luno_posts";

    public function topic()
    {
        return $this->belongsTo(Topic::class, "topic_id", "id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, "post_id", "id");
    }
}