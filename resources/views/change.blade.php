@extends('layouts.master')

@section('title', 'Изменение данных')

@section('content')
    <div class="container">
        <h1>Изменение данных</h1>
        <form method="POST" action="{{ route('change') }}">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input id="login" type="text" class="form-control" name="login" value="{{ $user->login }}" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            @if($user->role === 'student')
                <div class="form-group">
                    <label for="group">Учебная группа</label>
                    <input id="group" type="text" class="form-control" name="group" value="{{ $user->group }}" required>
                </div>
            @elseif($user->role === 'teacher')
                <!-- Заглушка для преподавателя -->
                <div class="form-group">
                    <label for="placeholder">Мини-меню (заглушка)</label>
                    <input id="placeholder" type="text" class="form-control" name="placeholder" value="Заглушка для преподавателя" readonly>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
