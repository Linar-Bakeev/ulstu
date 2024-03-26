<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    // Метод для отображения списка учебных годов
    public function index()
    {
        // Получение списка учебных годов из модели
        $academicYears = AcademicYear::all();

        // Возврат представления с данными учебных годов
        return view('academic_years.index', compact('academicYears'));
    }

}
