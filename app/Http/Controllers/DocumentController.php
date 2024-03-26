<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    // Метод для отображения списка документов
    public function index()
    {
        // Получение списка документов из модели
        $documents = Document::all();

        // Возврат представления с данными документов
        return view('documents.index', compact('documents'));
    }

}
