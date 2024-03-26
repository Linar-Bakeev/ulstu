<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Отображение списка предметов
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    // Отображение формы создания предмета
    public function create()
    {
        return view('subjects.create');
    }

    // Сохранение нового предмета
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Subject::create($validatedData);

        return redirect()->route('subjects.index')->with('success', 'Предмет успешно добавлен.');
    }
}
