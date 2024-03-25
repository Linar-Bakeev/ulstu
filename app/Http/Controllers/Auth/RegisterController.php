<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Показывает форму регистрации.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Обрабатывает данные регистрации пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'person_id' => 'required|string|unique:users,person_id',
            'admission_year' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|in:student,teacher',
        ]);

        // Создание нового пользователя
        $user = User::create([
            'person_id' => $validatedData['person_id'],
            'email' => $validatedData['email'],
            'password' => Hash::make(Str::random(10)), // Генерация случайного пароля
            'role' => $validatedData['role'],
            'admission_year' => $validatedData['admission_year'], // Добавление года поступления
        ]);

        // Авторизация нового пользователя
        auth()->login($user);

        // Перенаправление пользователя на страницу личного кабинета
        if ('role' == 'student'){
        return redirect()->route('student.dashboard');
        } elseif ('role' == 'teacher'){
            return redirect()->route('teacher.dashboard');
        } else{
            return redirect()->route('admin.dashboard');
        }
    }
}
