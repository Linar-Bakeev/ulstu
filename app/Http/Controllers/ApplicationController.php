<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    // Метод для отображения списка заявлений
    public function index()
    {
        // Получение списка заявлений из модели
        $applications = Application::all();

        // Возврат представления с данными заявлений
        return view('applications.index', compact('applications'));
    }

}
