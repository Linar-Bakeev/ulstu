<?php

namespace App\Http\Controllers\LKs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('lks.admin.dashboard');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('change', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'plain_password' => 'required|string', // Проверка текущего пароля
            'password' => 'required|string|min:8', // Проверка нового пароля
            'email' => 'required|email',
        ]);

        $user = Auth::user();

        // Проверка соответствия введенного текущего пароля
        if (!Hash::check($validatedData['plain_password'], $user->password)) {
            return back()->withErrors([
                'plain_password' => 'Текущий пароль неверен.',
            ]);
        }

        // Обновление данных пользователя
        $user->update([
            'password' => bcrypt($validatedData['password']), // Хеширование нового пароля
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Данные пользователя успешно обновлены.');
    }
}
