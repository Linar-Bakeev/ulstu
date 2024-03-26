@extends('layouts.master')

@section('title', 'Заполнение ведомости')

@section('content')
    <div class="container">
        <h1>Заполнение ведомости</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('grades.store') }}">
            @csrf
            <div class="form-group">
                <label for="group_id">Группа</label>
                <select class="form-control" id="group_id" name="group_id">
                    <!--  вывести список групп -->
                </select>
            </div>
            <div class="form-group">
                <label for="subject_id">Предмет</label>
                <select class="form-control" id="subject_id" name="subject_id">
                    <!--  вывести список предметов -->
                </select>
            </div>
            <div class="form-group">
                <label for="student_id">Студент</label>
                <select class="form-control" id="student_id" name="student_id">
                    <!--  вывести список студентов -->
                </select>
            </div>
            <div class="form-group">
                <label for="mark">Оценка</label>
                <input type="number" class="form-control" id="mark" name="mark" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary">Добавить оценку</button>
        </form>
    </div>
@endsection
