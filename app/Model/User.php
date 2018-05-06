<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "luno_users";
    protected $fillable = [
        'user_name', 'birthdate', 'job', 'about'
    ];
    protected $dates = [
        'birthdate'
    ];

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
        return $this->belongsToMany(Classroom::class, "luno_user_classroom");
    }
}