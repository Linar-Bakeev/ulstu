@extends('layouts.master')

@section('title', 'Изменение данных')

@section('content')
    <div class="container">
        <h1>Изменение данных</h1>
        <form method="POST" action="{{ route('change') }}">
            @csrf

            <div class="form-group">
                <label for="password">Новый пароль</label>
                <input id="password" type="password" class="form-control" name="password" >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email}}" >
            </div>
            @if(auth()->user()->role === 'student')
                <div class="form-group">
                    <label for="group">Учебная группа</label>
                    <input id="group" type="text" class="form-control" name="group" value="{{ auth()->user()->group}}" >
                </div>
            @elseif(auth()->user()->role === 'teacher')

                <div class="form-group">

                </div>
            @endif
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
