<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\ActualClassroom;

class Classroom extends Model implements ActualClassroom
{
    protected $table = "luno_classrooms";
    protected $fillable = [
        'start_date', 'end_date', 'max_students', 'description', 'welcome_text'
    ];
    protected $dates = [
        'start_date', 'end_date'
    ];

    public function loadDefault()
    {
        return $this->load([
            'course', 'chapters'
        ])->load(['sections' => function ($query) {
            $query->withCount('topics');
        }]);
    }

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
        return $this->hasMany(Chapter::class, "classroom_id", "id");
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
        return $this->belongsToMany(User::class, "luno_user_classroom")->withPivot('approved', 'role')->withTimestamps();
    }

    public function students()
    {
        return $this->registrations()->wherePivot('approved', 1)->wherePivot('role', 'student');
    }

    public function myRegistrations()
    {
        return $this->registrations()->whereId(\Auth::id());
    }

    public function calendar()
    {
        return $this->hasMany(Calendar::class, "classroom_id");
    }

    public function podeSerEditadoPor($user)
    {
        return $user && \DB::select("select 1 from luno_user_classroom where user_id = ? and classroom_id = ? and role = 'teacher'", [
            $user->id, $this->id
        ]);
    }

    public function topics()
    {
        return $this->hasManyThrough(Topic::class, Section::class);
    }
}