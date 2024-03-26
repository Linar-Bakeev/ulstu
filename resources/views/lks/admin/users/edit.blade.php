@extends('layouts.master')

@section('title', 'Редактировать пользователя')

@section('content')
    <div class="container">
        <h1>Редактировать пользователя</h1>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="person_id">ID пользователя</label>
                <input type="text" name="person_id" id="person_id" class="form-control" value="{{ $user->person_id }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="role">Роль</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">Выберите роль</option>
                    <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Студент</option>
                    <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Преподаватель</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Администратор</option>
                </select>
            </div>
            @if($user->role == 'student')
            <div class="form-group">
                <label for="group_id">Группа</label>
                <select name="group_id" id="group_id" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ $user->group_id === $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
