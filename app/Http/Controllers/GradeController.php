<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    // Метод для отображения успеваемости студентов
    public function showPerformance()
    {
        // Получение данных об успеваемости студентов из модели
        $grades = Grade::all();

        // Возврат представления с данными об успеваемости
        return view('grades.performance', compact('grades'));
    }

    // Другие методы для управления оценками
}
