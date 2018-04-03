<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "luno_courses";

    public function institution()
    {
        return $this->belongsTo(Institution::class, "institution_id", "id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class, "course_id", "id");
    }
}