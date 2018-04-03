<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "luno_media";

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, "classroom_id", "id");
    }

    public function owner()
    {
        return $this->belongsTo(Media::class, "owner_id", "id");
    }
}