<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'group_id', 'subject_id', 'student_id','mark',
    ];
}
