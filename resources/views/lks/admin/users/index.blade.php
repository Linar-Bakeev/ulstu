@extends('layouts.master')

@section('title', 'Список пользователей')

@section('content')
    <div class="container">
        <h1>Список пользователей</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Добавить пользователя</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Год поступления</th>
                <th>Учебная группа</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->person_id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->admission_year }}</td>
                    <td>
                        @if($user->role === 'student')
                        {{ $user->group->name }}
                        @else
                            Не является студентом
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <div id="notification" class="notification hidden">Пользователь успешно добавлен</div>
@endsection
