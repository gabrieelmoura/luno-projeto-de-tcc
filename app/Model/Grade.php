<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "luno_grades";
    protected $fillable = [
        'msg'
    ];
    protected $dates = [
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function task()
    {
        return $this->belongsTo(Task::class, "task_id", "id");
    }

    public function avaliator()
    {
        return $this->belongsTo(User::class, "avaliator_id", "id");
    }

    public function media()
    {
        return $this->belongsTo(Media::class, "media_id", "id");
    }
}