<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "luno_users";

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function avatar()
    {
        return $this->belongsTo(Media::class, "avatar_id", "id");
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, "user_id", "id");
    }
}