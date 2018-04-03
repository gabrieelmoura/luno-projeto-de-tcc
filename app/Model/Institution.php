<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = "luno_institutions";

    public function courses()
    {
        return $this->hasMany(Course::class, "institution_id", "id");
    }
}