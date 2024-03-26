@extends('layouts.master')

@section('title', 'Успеваемость студентов')

@section('content')
    <div class="container">
        <h1>Успеваемость студентов</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Студент</th>
                <th>Предмет</th>
                <th>Оценка</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->subject->name }}</td>
                    <td>{{ $grade->mark }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
