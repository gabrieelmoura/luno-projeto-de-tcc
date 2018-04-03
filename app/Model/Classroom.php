<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = "luno_classrooms";

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id", "id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function sections()
    {
        return $this->hasMany(Section::class, "classroom_id", "id");
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, "classrooom_id", "id");
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, "classroom_id", "id");
    }

    public function media()
    {
        return $this->hasMany(Media::class, "classroom_id", "id");
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, "classroom_id", "id");
    }
}