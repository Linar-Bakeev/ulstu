@extends('layouts.master')

@section('title', 'Успеваемость студента')

@section('content')
    <div class="container">
        <h1>Успеваемость студента</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Предмет</th>
                    <th>Оценка</th>
                    <th>Долг</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade->subject->name }}</td>
                        <td>{{ $grade->mark }}</td>
                        <td>{{ $grade->is_debt ? 'Да' : 'Нет' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
