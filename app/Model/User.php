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

    public function getBirthdateFormatedAttribute()
    {
        return $this->birthdate ? $this->birthdate->format('Y-m-d') : '--';
    }

    public function getBirthdateFormatedBrAttribute()
    {
        return $this->birthdate ? $this->birthdate->format('d/m/Y') : '--';
    }

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
        return $this->belongsToMany(Classroom::class, "luno_user_classroom")->withTimestamps()->withPivot('approved', 'role');
    }

    public function approvedRegistrations()
    {
        return $this->registrations()->wherePivot('approved', true);
    }
}