<?php

namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('lks.student.dashboard');
    }
}
