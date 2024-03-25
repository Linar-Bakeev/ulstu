@extends('layouts.master')

@section('title', 'Список групп')

@section('content')
    <h1>Список групп</h1>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название группы</th>
                    <!-- Другие заголовки -->
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <!-- Другие поля -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
