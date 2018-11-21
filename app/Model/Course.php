<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "luno_courses";
    protected $fillable = [
        'course_name', 'subtitle', 'description'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

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

    public function openClassrooms()
    {
        return $this->hasMany(Classroom::class, "course_id", "id");
    }

    public function image()
    {
        return $this->belongsTo(Media::class, "image_id", "id");
    }

    public function podeSerEditadoPor($user)
    {
        return $user && $this->creator_id == $user->id;
    }
}