<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "luno_topics";

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function section()
    {
        return $this->belongsTo(Section::class, "section_id", "id");
    }

    public function posts()
    {
        return $this->hasMany(Post::class, "topic_id", "id");
    }

    public function lastPost()
    {
        return $this->hasOne(Post::class, "topic_id", "id")->orderBy("id", "DESC");
    }
}