<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    // Метод для отображения списка предметов
    public function index()
    {
        // Получение списка предметов из модели
        $subjects = Subject::all();

        // Возврат представления с данными предметов
        return view('subjects.index', compact('subjects'));
    }

    // Другие методы для управления предметами
}
