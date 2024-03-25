<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'group_id', 'subject_id', 'teacher_id', 'auditorium_id', 'start_time', 'end_time',
    ];
}
