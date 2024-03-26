<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Показывает форму входа.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Обрабатывает данные входа пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Разделение ввода email на person_id и admission_year
        $loginParts = explode('/', $validatedData['login']);

        if (count($loginParts) !== 2) {
            // Если введенный логин не соответствует формату "person_id/admission_year",
            // то выводим сообщение об ошибке и возвращаемся на страницу входа
            return back()->withErrors([
                'login' => 'Неверный формат логина. Введите логин в формате "номер студенческого билета/год поступления".',
            ])->withInput($request->only('login'));
        }
        // Извлечение person_id и admission_year из введенного логина
        $person_id = $loginParts[0];
        $admission_year = $loginParts[1];

        // Формирование логина в формате "person_id/admission_year"
        $login = $validatedData['login'];

        // Аутентификация пользователя по новому логину
        if (Auth::attempt(['person_id' => $person_id, 'admission_year' => $admission_year, 'password' => $validatedData['password']])) {
            // Получаем аутентифицированного пользователя
            $user = Auth::user();

            // Перенаправление пользователя в зависимости от его роли
            if ($user->role == 'student') {
                return redirect()->route('student.dashboard');
            } elseif ($user->role == 'teacher') {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        // Неверные учетные данные - возврат обратно с сообщением об ошибке
        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ])->withInput($request->only('login'));
    }

    /**
     * Выход пользователя из системы.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
