<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditorium;

class AuditoriumController extends Controller
{
    // Метод для отображения списка аудиторий
    public function index()
    {
        // Получение списка аудиторий из модели
        $auditoriums = Auditorium::all();

        // Возврат представления с данными аудиторий
        return view('auditoriums.index', compact('auditoriums'));
    }

}
