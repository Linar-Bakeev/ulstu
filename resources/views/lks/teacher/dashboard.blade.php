@extends('layouts.master')

@section('title', 'Личный кабинет преподавателя')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет преподавателя</div>

                    <div class="card-body">
                        <p><strong>Логин:</strong> {{ auth()->user()->person_id }}</p>
                        <p><strong>Пароль:</strong> {{ auth()->user()->plain_password }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Действия</div>

                    <div class="card-body">
                        <form style="margin-bottom: 10px;" method="POST" action="{{ route('change') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Редактировать данные</button>
                        </form>
                        <a href="{{ route('teacher.grades') }}" class="btn btn-primary">Просмотреть успеваемость</a>
                        <a href="{{ route('grades.create') }}" class="btn btn-primary">Заполнить ведомость</a>
                        <a href="{{ route('teacher.create_announcement_form') }}" class="btn btn-primary">Создать объявление</a>
                        <a style="margin-top: 5px" href="{{ route('teacher.subjects') }}" class="btn btn-primary">Мои предметы</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
