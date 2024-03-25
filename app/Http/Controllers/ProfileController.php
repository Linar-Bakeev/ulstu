<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Показывает страницу личного кабинета пользователя.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Получить текущего аутентифицированного пользователя
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }
}
