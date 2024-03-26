@extends('layouts.master')

@section('title', 'Добавить предмет')

@section('content')
    <div class="container">
        <h1>Добавить предмет</h1>
        <form method="POST" action="{{ route('subjects.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Название предмета</label>
                <input id="name" type="text" class="form-control" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
