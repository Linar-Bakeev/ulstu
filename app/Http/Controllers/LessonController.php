<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    // Метод для отображения расписания
    public function showSchedule()
    {
        // Получение расписания из модели
        $schedule = Lesson::all();

        // Возврат представления с расписанием
        return view('schedule.index', compact('schedule'));
    }

}
