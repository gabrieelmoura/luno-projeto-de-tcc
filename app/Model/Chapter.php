<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = "luno_chapters";
    protected $fillable = [
        'title', 'content'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }
}