<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = "luno_registrations";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }
}