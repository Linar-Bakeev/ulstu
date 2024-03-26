<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function subjects()
    {
        $teacher = Auth::user();
        $subjects = $teacher->subjects;
        return view('subjects.index', compact('subjects'));
    }
}
