@extends('layouts.master')

@section('title', 'Личный кабинет студента')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет студента</div>

                    <div class="card-body">
                        <p><strong>Логин:</strong> {{ auth()->user()->person_id }}</p>
                        <p><strong>Пароль:</strong> *********</p>
                        <p><strong>Учебная группа:</strong> {{ auth()->user()->group }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('change') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Редактировать данные</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
