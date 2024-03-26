<?php

namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('lks.student.dashboard');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('change', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Проверка соответствия введенного текущего пароля
        if (!Hash::check($request->plain_password, $user->password)) {
            return back()->withErrors([
                'plain_password' => 'Текущий пароль неверен.',
            ]);
        }

        // Валидация данных
        $validatedData = $request->validate([
            'password' => 'required|string|min:8', // Проверка нового пароля
            'email' => 'required|email',
            'group' => 'required_if:role,student|string',
        ]);

        // Обновление данных пользователя
        $user->update([
            'password' => bcrypt($validatedData['password']), // Хеширование нового пароля
            'email' => $validatedData['email'],
            'group' => $validatedData['group'] ?? $user->group,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Данные пользователя успешно обновлены.');
    }
    public function requestEducationCertificate()
    {
        // логика запроса справки об обучении в ВУЗе
    }

    public function requestExamResit()
    {
        // логика запроса направления на пересдачу
    }

    public function applyForScholarship()
    {
        // логика подачи заявления о повышенной стипендии
    }
}
