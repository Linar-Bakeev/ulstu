<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    // Метод для отображения списка групп
    public function index()
    {
        // Получение списка групп из модели
        $groups = Group::all();

        // Возврат представления с данными групп
        return view('groups.index', compact('groups'));
    }

}
