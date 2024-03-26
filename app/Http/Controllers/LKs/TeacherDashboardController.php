<?php

namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Announcement;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        return view('lks.teacher.dashboard');
    }

    public function viewGrades()
    {
        // Получение успеваемости по предметам
        $grades = Grade::all();

        return view('grades.performance', compact('grades'));
    }

    public function fillAttendance()
    {
        //  логика заполнения ведомости
    }

    public function createAnnouncementForm()
    {
        //логика формирования формы для создания объявления
    }

    public function postAnnouncement(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'group_id' => 'nullable|integer',
        ]);

        // Создание объявления
        Announcement::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'group_id' => $validatedData['group_id'],
            'teacher_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Объявление успешно опубликовано.');
    }
}
