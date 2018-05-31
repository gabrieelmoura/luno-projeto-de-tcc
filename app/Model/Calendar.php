<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = "luno_calendar";
    protected $fillable = [
    	'event_date', 'content'
    ];
    protected $dates = [
    	'event_date'
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