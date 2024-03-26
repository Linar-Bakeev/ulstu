@extends('layouts.master')

@section('title', 'Успеваемость студентов')

@section('content')
    <div class="container">
        <h1>Успеваемость студентов</h1>
        @foreach ($grades as $subjectId => $subjectGrades)
            <h2>Предмет: {{ $subjectGrades->first()->subject->name }}</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Студент</th>
                    <th>Оценка</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjectGrades->groupBy('student.group_id') as $groupId => $groupGrades)
                    <tr>
                        <td colspan="2"><strong>Группа: {{ $groupGrades->first()->student->group->name }}</strong></td>
                    </tr>
                    @foreach ($groupGrades as $grade)
                        <tr>
                            <td>{{ $grade->student->name }}</td>
                            <td>{{ $grade->mark }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
