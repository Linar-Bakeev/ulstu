<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Application;
use App\Models\Document;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Просмотр успеваемости по предметам.
     *
     * @return \Illuminate\View\View
     */
    public function viewAcademicPerformance()
    {
        $user = Auth::user();
        $grades = Grade::where('student_id', $user->id)->get();

        // Дополнительная логика для выделения долгов
        foreach ($grades as $grade) {
            // Проверяем, если оценка не явка, помечаем как долг
            if ($grade->mark === 'неявка') {
                $grade->is_debt = true;
            } else {
                $grade->is_debt = false;
            }
        }

        return view('lks.student.academic_performance', compact('grades'));
    }
    /**
     * Запросить справку об обучении в ВУЗе.
     *
     * @return \Illuminate\View\View
     */
    public function requestEducationCertificate()
    {
        // Логика для запроса справки об обучении

        return view('lks.student.education_certificate');
    }

    /**
     * Запросить направление на пересдачу с возможностью перехода со странички долга по дисциплине.
     *
     * @return \Illuminate\View\View
     */
    public function requestExamResit()
    {
        // Логика для запроса направления на пересдачу

        return view('lks.student.exam_resit');
    }

    /**
     * Подать заявление о повышенной стипендии с прикреплением набора грамот, дипломов и других документов.
     *
     * @return \Illuminate\View\View
     */
    public function applyForScholarship()
    {
        // Логика для подачи заявления о повышенной стипендии

        return view('lks.student.scholarship_application');
    }
}
