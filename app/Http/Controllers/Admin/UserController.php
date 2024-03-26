<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('lks.admin.users.index', compact('users'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('lks.admin.users.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'person_id' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|min:6',
            'role' => 'required|in:student,teacher,admin',
            'group_id' => 'required_if:role,student|exists:groups,id',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        // Проверяем, выбрана ли роль студента
        if ($request->role === 'student') {
            // Сохраняем пользователя со связанной группой
            $user = User::create($validatedData);
            $user->groups()->attach($request->group_id);
        } else {
            // Сохраняем пользователя без связанной группы
            User::create($validatedData);
        }

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно добавлен.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();
        return view('lks.admin.users.edit', compact('user', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'person_id' => 'required|string|unique:users,person_id,'.$user->id,
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'role' => 'required|in:student,teacher,admin',
            'group_id' => 'required_if:role,student|exists:groups,id',
        ]);

        $user->update($validatedData);

        // Обновляем связь пользователя с группой, если выбрана роль студента
        if ($request->role === 'student') {
            $user->groups()->sync($request->group_id);
        } else {
            $user->groups()->detach();
        }

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно обновлен.');
    }
}
