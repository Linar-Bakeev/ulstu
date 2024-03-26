@extends('layouts.master')

@section('title', 'Добавить группу')

@section('content')
    <div class="container">
        <h1>Добавить группу</h1>
        <form method="POST" action="{{ route('admin.groups.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название группы</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stream">Поток</label>
                <input type="text" name="stream" id="stream" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
