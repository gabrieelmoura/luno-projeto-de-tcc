<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "luno_sections";
    protected $fillable = [
        'title', 'subtitle'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, "section_id", "id");
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Topic::class);
    }
}
