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
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Преобразование логина в формат "20/5762020"
        $login = $validatedData['email'];

        // Аутентификация пользователя по новому логину
        if (Auth::attempt(['person_id' => $login, 'password' => $validatedData['password']])) {
            // Успешный вход - перенаправление пользователя
            return redirect()->intended(route('dashboard'));
        }

        // Неверные учетные данные - возврат обратно с сообщением об ошибке
        return back()->withErrors([
            'email' => 'Неверный логин или пароль.',
        ])->withInput($request->only('email'));
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
