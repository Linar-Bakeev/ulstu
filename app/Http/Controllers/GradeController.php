<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;


class GradeController extends Controller
{

    public function create(Request $request)
    {
        // Получаем список предметов преподавателя
        $subjects = Auth::user()->subjects;

        // Получаем список групп
        $groups = Group::all();

        // По умолчанию список студентов пуст
        $students = [];

        if ($request->has('group_id')) {
            $group = Group::find($request->group_id);
            if ($group) {
                $students = $group->students;
            }
        }


        return view('grades.create', compact('subjects', 'groups', 'students'));
    }
    public function getStudentsByGroupId($groupId)
    {
        // Получаем объект группы по ее ID
        $group = Group::findOrFail($groupId);

        // Получаем список студентов этой группы
        $students = $group->students;

        return $students;
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
