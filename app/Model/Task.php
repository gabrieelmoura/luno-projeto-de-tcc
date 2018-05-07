<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "luno_tasks";
    protected $fillable = [
        'deadline', 'title', 'description', 'weight'
    ];
    protected $dates = [
        'deadline'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, "task_id", "id");
    }
}
