<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    // Метод для отображения списка учителей
    public function index()
    {
        // Получение списка учителей из модели

        // Возврат представления с данными учителей
    }

    public function subjects()
    {
        $teacher = Auth::user();
        $subjects = $teacher->subjects;
        return view('teacher.subjects', compact('subjects'));
    }
}
