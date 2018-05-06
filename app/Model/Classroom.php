<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = "luno_classrooms";
    protected $fillable = [
        'start_date', 'end_date', 'hidden', 'max_students', 'description', 'welcome_text'
    ];

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
        return $this->belongsToMany(User::class, "luno_user_classroom");
    }
}