@extends('layouts.master')

@section('title', 'Личный кабинет администратора')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет администратора</div>

                    <div class="card-body">
                        <p><strong>Логин:</strong> {{ auth()->user()->person_id }}</p>
                        <p><strong>Пароль:</strong> {{ auth()->user()->plain_password }}</p>
                        <form method="POST" action="{{ route('change') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Редактировать данные</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Управление порталом</div>

                    <div class="card-body">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Управление пользователями</a>
                        <a href="{{ route('admin.groups.index') }}" class="btn btn-primary">Управление группами</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
