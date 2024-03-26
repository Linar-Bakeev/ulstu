@extends('layouts.master')

@section('title', 'Добавление предмета')

@section('content')
    <div class="container">
        <h1>Добавление предмета</h1>
        <form method="POST" action="{{ route('teacher.subjects.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название предмета</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить предмет</button>
        </form>
    </div>
@endsection
