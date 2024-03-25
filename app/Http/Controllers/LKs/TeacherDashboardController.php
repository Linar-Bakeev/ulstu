<?php

namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        return view('lks.teacher.dashboard');
    }
}
