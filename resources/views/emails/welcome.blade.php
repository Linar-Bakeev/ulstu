@extends('layouts.master')

@section('title', 'Приветствуем!')

@section('content')
<h1>Добро пожаловать!</h1>

<p>Вы успешно зарегистрировались на нашем сайте. Вот ваша учетная запись:</p>

<p><strong>Логин:</strong> {{ $user->person_id }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Роль:</strong> {{ $user->role }}</p>

<p>Ваш временный пароль: {{ $password }}</p>

<p>Пожалуйста, измените пароль после входа в систему.</p>

<p>Спасибо!</p>
@endsection
