<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    // Метод для отображения успеваемости студентов
    public function showPerformance()
    {
        $grades = Grade::with('student', 'subject')->get()->groupBy('subject_id');

        return view('grades.performance', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        // Проверка и валидация данных
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:students,id',
            'mark' => 'required|numeric|min:1|max:5',
        ]);

        // Создание новой записи оценки
        Grade::create($validatedData);

        return redirect()->route('grades.create')->with('success', 'Оценка успешно добавлена.');
    }
}
