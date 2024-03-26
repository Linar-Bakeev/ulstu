<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
{
    // Отображение списка групп
    public function index()
    {
        $groups = Group::all();
        return view('lks.admin.groups.index', compact('groups'));
    }

    // Отображение формы для создания новой группы
    public function create()
    {
        return view('lks.admin.groups.create');
    }

    // Сохранение новой группы
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:groups',
            'stream'=>'required|string|max:10'
        ]);

        Group::create($validatedData);

        return redirect()->route('admin.groups.index', ['success' => true]);
    }

}
