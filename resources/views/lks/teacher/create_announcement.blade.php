@extends('layouts.master')

@section('title', 'Создать объявление')

@section('content')
    <div class="container">
        <h1>Создать объявление</h1>
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('teacher.post_announcement') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Содержание</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="group_id">Группа</label>
                <input type="text" class="form-control" id="group_id" name="group_id">
            </div>
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
    </div>
@endsection
