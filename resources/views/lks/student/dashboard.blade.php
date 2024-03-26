@extends('layouts.master')

@section('title', 'Личный кабинет студента')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет студента</div>

                    <div class="card-body">
                        <p><strong>Логин:</strong> {{ auth()->user()->person_id }}{{ auth()->user()->admission_year }}</p>
                        <p><strong>Пароль:</strong> {{ auth()->user()->plain_password }}</p>
                        <p><strong>Учебная группа:</strong> {{ auth()->user()->group }}</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('change') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Редактировать данные</button>
                        </form>
                        <a href="{{ route('student.education_certificate') }}" class="btn btn-primary">Запросить справку об обучении</a>
                        <a href="{{ route('student.exam_resit') }}" class="btn btn-primary">Запросить направление на пересдачу</a>
                        <a href="{{ route('student.scholarship_application') }}" class="btn btn-primary">Подать заявление о повышенной стипендии</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--        <h2>Успеваемость</h2>--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Предмет</th>--}}
{{--                <th>Оценка</th>--}}
{{--                <th>Долги</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($grades as $grade)--}}
{{--                <tr>--}}
{{--                    <td>{{ $grade->subject->name }}</td>--}}
{{--                    <td>{{ $grade->mark }}</td>--}}
{{--                    <td>{{ $grade->is_debt ? 'Есть' : 'Нет' }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}


@endsection
