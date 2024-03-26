@extends('layouts.master')

@section('title', 'Заполнение ведомости')

@section('content')
    <div class="container">
        <h1>Заполнение ведомости</h1>
        <form method="POST" action="{{ route('grades.store') }}">
            @csrf
            <table class="table">
                <thead>
                <tr>
                    <th>Студент</th>
                    <th>Оценка</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <input type="number" name="grades[{{ $student->id }}]" min="1" max="10">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Сохранить оценки</button>
        </form>
    </div>
@endsection
