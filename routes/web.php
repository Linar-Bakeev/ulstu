<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LKs\AdminDashboardController;
use App\Http\Controllers\LKs\StudentDashboardController;
use App\Http\Controllers\LKs\TeacherDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Роуты для регистрации и аутентификации
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Маршруты для личного кабинета студента
    Route::prefix('lks/student')->group(function () {

        Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
        Route::get('academic-performance', [StudentController::class, 'viewAcademicPerformance'])->name('student.academic_performance');
        Route::get('education-certificate', [StudentController::class, 'requestEducationCertificate'])->name('student.education_certificate');
        Route::get('exam-resit', [StudentController::class, 'requestExamResit'])->name('student.exam_resit');
        Route::get('scholarship-application', [StudentController::class, 'applyForScholarship'])->name('student.scholarship_application');
    });

    // Маршруты для личного кабинета администратора
    Route::prefix('lks/admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // Маршруты для управления пользователями и группами
        Route::resource('users', UserController::class, ['as' => 'admin']); // Маршруты для пользователей
        Route::resource('groups', GroupsController::class, ['as' => 'admin']); // Маршруты для групп
    });

    // Маршруты для личного кабинета преподавателя
    Route::prefix('lks/teacher')->group(function () {
        Route::get('dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
        Route::get('grades', [TeacherDashboardController::class, 'viewGrades'])->name('teacher.grades');
        Route::get('fill_attendance', [TeacherDashboardController::class, 'fillAttendance'])->name('teacher.fill_attendance');
        Route::get('create_announcement_form', [TeacherDashboardController::class, 'createAnnouncementForm'])->name('teacher.create_announcement_form');
        Route::post('post_announcement', [TeacherDashboardController::class, 'postAnnouncement'])->name('teacher.post_announcement');
        Route::get('subjects', [TeacherController::class, 'subjects'])->name('teacher.subjects'); // Добавленный маршрут
    });
});

// Маршруты для других представлений
Route::get('/groups', [ScheduleController::class, 'index'])->name('groups.index'); // Пока не определено, какой контроллер используется для списка групп, поэтому временно указан ScheduleController
Route::get('/schedule', [ScheduleController::class, 'showSchedule'])->name('schedule.index');
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/academic_years', [AcademicYearController::class, 'index'])->name('academic_years.index');

Route::prefix('lks/teacher')->group(function () {
    // Другие маршруты...
    Route::get('subjects', [TeacherController::class, 'subjects'])->name('teacher.subjects'); // Добавленный маршрут
    Route::get('subjects/create', [SubjectController::class, 'create'])->name('teacher.subjects.create');
    Route::post('subjects/store', [SubjectController::class, 'store'])->name('teacher.subjects.store');
});

Route::post('change', function (){return view('change');})->name('change');

Route::resource('subjects', 'SubjectController');

Route::get('/grades', [GradeController::class, 'showPerformance'])->name('grades.performance');
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store');
